<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Importable Trait
 * 
 * Menyediakan fungsionalitas import data dari CSV.
 * Digunakan oleh modul Master Data untuk bulk import.
 * 
 * Usage:
 *   use Importable;
 *   
 *   $result = $this->importFromCsv($file, Major::class, [
 *       'code' => 'Kode',
 *       'name' => 'Nama Jurusan',
 *   ]);
 */
trait Importable
{
    /**
     * Import data dari file CSV.
     *
     * @param  UploadedFile  $file
     * @param  string  $modelClass  Class model Eloquent
     * @param  array  $columnMap  Mapping header CSV ke nama kolom DB
     *                            Contoh: ['code' => 'Kode', 'name' => 'Nama']
     *                            Jika null, header CSV harus sama persis dengan nama kolom
     * @param  array  $rules  Validation rules per kolom (optional)
     * @param  bool  $useTransaction  Gunakan transaction (default: true)
     * @return array{imported: int, skipped: int, errors: array}
     */
    public function importFromCsv(
        UploadedFile $file,
        string $modelClass,
        ?array $columnMap = null,
        array $rules = [],
        bool $useTransaction = true
    ): array {
        // Validasi file
        if (!$this->isValidCsvFile($file)) {
            return [
                'imported' => 0,
                'skipped' => 0,
                'errors' => ['Invalid file. Please upload a valid CSV file.'],
            ];
        }

        $handle = fopen($file->getRealPath(), 'r');
        if ($handle === false) {
            return [
                'imported' => 0,
                'skipped' => 0,
                'errors' => ['Unable to open file.'],
            ];
        }

        // Baca header
        $csvHeaders = fgetcsv($handle);
        if ($csvHeaders === false || empty($csvHeaders)) {
            fclose($handle);
            return [
                'imported' => 0,
                'skipped' => 0,
                'errors' => ['CSV file is empty or has no headers.'],
            ];
        }

        // Normalisasi header (trim whitespace & lowercase)
        $csvHeaders = array_map('trim', $csvHeaders);

        $imported = 0;
        $skipped = 0;
        $errors = [];
        $rowNumber = 1; // Header = row 1, data mulai dari row 2

        $processRow = function (array $row) use (
            &$rowNumber,
            &$imported,
            &$skipped,
            &$errors,
            $csvHeaders,
            $columnMap,
            $modelClass,
            $rules
        ) {
            $rowNumber++;

            // Skip baris kosong
            if (count($row) === 1 && ($row[0] === null || $row[0] === '')) {
                $skipped++;
                return;
            }

            // Validasi jumlah kolom
            if (count($row) !== count($csvHeaders)) {
                $errors[] = "Row {$rowNumber}: Column count mismatch (expected " . count($csvHeaders) . ", got " . count($row) . ").";
                return;
            }

            // Combine headers dengan data row
            $rawData = array_combine($csvHeaders, $row);
            if ($rawData === false) {
                $errors[] = "Row {$rowNumber}: Failed to map data.";
                return;
            }

            // Apply column mapping jika ada
            $data = $this->mapColumns($rawData, $columnMap);

            // Bersihkan data (trim string values)
            $data = array_map(function ($value) {
                return is_string($value) ? trim($value) : $value;
            }, $data);

            // Hapus nilai kosong (null/empty string)
            $data = array_filter($data, function ($value) {
                return $value !== null && $value !== '';
            });

            // Validasi jika rules diberikan
            if (!empty($rules)) {
                $validator = Validator::make($data, $rules);
                if ($validator->fails()) {
                    $errorMessages = implode(', ', $validator->errors()->all());
                    $errors[] = "Row {$rowNumber}: {$errorMessages}";
                    return;
                }
            }

            // Cek duplikasi (jika model punya unique constraint)
            try {
                $modelClass::create($data);
                $imported++;
            } catch (\Illuminate\Database\QueryException $e) {
                // Tangani duplikasi atau constraint violation
                $message = $this->extractDatabaseError($e);
                $errors[] = "Row {$rowNumber}: {$message}";
            } catch (\Exception $e) {
                $errors[] = "Row {$rowNumber}: {$e->getMessage()}";
            }
        };

        // Process rows dengan transaction jika diminta
        if ($useTransaction) {
            DB::transaction(function () use ($handle, $processRow) {
                while (($row = fgetcsv($handle)) !== false) {
                    $processRow($row);
                }
            });
        } else {
            while (($row = fgetcsv($handle)) !== false) {
                $processRow($row);
            }
        }

        fclose($handle);

        return [
            'imported' => $imported,
            'skipped' => $skipped,
            'errors' => $errors,
            'total_rows' => $rowNumber - 1,
        ];
    }

    /**
     * Map CSV headers ke nama kolom database.
     */
    protected function mapColumns(array $data, ?array $columnMap): array
    {
        if (empty($columnMap)) {
            return $data;
        }

        $mapped = [];
        foreach ($columnMap as $dbColumn => $csvHeader) {
            // Cari header yang cocok (case-insensitive)
            $matchedKey = collect(array_keys($data))->first(function ($key) use ($csvHeader) {
                return strtolower(trim($key)) === strtolower(trim($csvHeader));
            });

            if ($matchedKey !== null) {
                $mapped[$dbColumn] = $data[$matchedKey];
            }
        }

        return $mapped;
    }

    /**
     * Validasi file CSV.
     */
    protected function isValidCsvFile(UploadedFile $file): bool
    {
        $allowedExtensions = ['csv', 'txt'];
        $allowedMimeTypes = ['text/csv', 'text/plain', 'application/csv'];

        return in_array($file->getClientOriginalExtension(), $allowedExtensions)
            || in_array($file->getMimeType(), $allowedMimeTypes);
    }

    /**
     * Extract human-readable error dari QueryException.
     */
    protected function extractDatabaseError(\Illuminate\Database\QueryException $e): string
    {
        $message = $e->getMessage();

        if (str_contains($message, 'Duplicate entry')) {
            return 'Duplicate entry detected. Data already exists.';
        }

        if (str_contains($message, 'foreign key constraint')) {
            return 'Foreign key constraint failed. Related data not found.';
        }

        if (str_contains($message, 'cannot be null')) {
            return 'Required field is missing.';
        }

        return 'Database error occurred.';
    }

    /**
     * Generate template CSV untuk import.
     * Berguna untuk memberikan contoh format ke user.
     *
     * @param  array  $columns  Daftar kolom yang diperlukan
     * @param  array  $examples  Contoh nilai per kolom (optional)
     * @return string  Content CSV
     */
    public function generateCsvTemplate(array $columns, array $examples = []): string
    {
        $handle = fopen('php://temp', 'r+');

        // Header
        fputcsv($handle, $columns);

        // Contoh baris
        if (!empty($examples)) {
            fputcsv($handle, $examples);
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        return $csv;
    }

    /**
     * Download template CSV sebagai response.
     */
    public function downloadCsvTemplate(array $columns, array $examples = [], string $filename = 'template.csv')
    {
        $csv = $this->generateCsvTemplate($columns, $examples);

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"");
    }
}