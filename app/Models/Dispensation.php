<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Dispensation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dispensation_number',
        'request_type',
        'student_id',
        'teacher_id',
        'academic_year_id',
        'semester_id',
        'category_id',
        'destination_id',
        'dispensation_date',
        'leave_time',
        'return_time',
        'reason',
        'approved_by',
        'approved_at',
        'approval_note',
        'qr_token',
        'pdf_path',
        'checked_out_at',
        'checked_in_at',
        'status',
    ];

    protected $casts = [
        'dispensation_date' => 'date',
        'leave_time'        => 'datetime:H:i',
        'return_time'       => 'datetime:H:i',
        'approved_at'       => 'datetime',
        'checked_out_at'    => 'datetime',
        'checked_in_at'     => 'datetime',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Dispensation $model) {
            if (empty($model->dispensation_number)) {
                $model->dispensation_number = static::generateNumber();
            }
        });
    }

    /**
     * Generate nomor dispensasi otomatis
     * Format: DISP/YYYY-MM/XXXX
     */
    public static function generateNumber(): string
    {
        $yearMonth = date('Y-m');
        $lastDispensation = static::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->orderBy('id', 'desc')
            ->first();
        
        $lastNumber = $lastDispensation ? intval(substr($lastDispensation->dispensation_number, -4)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        
        return 'DISP/' . $yearMonth . '/' . $newNumber;
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(DispensationCategory::class, 'category_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(DispensationDestination::class, 'destination_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function qrScans(): HasMany
    {
        return $this->hasMany(QrScan::class);
    }

    public function gateLogs(): HasMany
    {
        return $this->hasMany(GateLog::class);
    }

    public function scopeStudent($query)
    {
        return $query->where('request_type', 'student');
    }

    public function scopeTeacher($query)
    {
        return $query->where('request_type', 'teacher');
    }

    public function isStudent(): bool
    {
        return $this->request_type === 'student';
    }

    public function isTeacher(): bool
    {
        return $this->request_type === 'teacher';
    }

    public function generateQrToken(): void
    {
        if ($this->isStudent() && is_null($this->qr_token)) {
            $this->qr_token = Str::uuid()->toString();
        }
    }
}