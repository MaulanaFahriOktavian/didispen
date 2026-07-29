<?php

namespace App\Services;

use App\Models\Dispensation;

class DispensationCodeService
{
    public static function generate(): string
    {
        $year = now()->format('Y');

        $last = Dispensation::whereYear('created_at', $year)
            ->latest('id')
            ->first();

        $number = $last
            ? ((int) substr($last->code, -6)) + 1
            : 1;

        return sprintf(
            'DSP/SMKN1B/%s/%06d',
            $year,
            $number
        );
    }
}