<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait Exportable
{
    public function exportToCsv(Collection $data, string $filename): string
    {
        $handle = fopen('php://temp', 'r+');
        
        fputcsv($handle, array_keys($data->first()->toArray()));
        
        foreach ($data as $row) {
            fputcsv($handle, $row->toArray());
        }
        
        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);
        
        return $csv;
    }
}