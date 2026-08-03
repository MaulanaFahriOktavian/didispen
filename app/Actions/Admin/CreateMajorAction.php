<?php

namespace App\Actions\Admin;

use App\Models\Major;
use Illuminate\Support\Facades\DB;

class CreateMajorAction
{
    public function execute(array $data): Major
    {
        return DB::transaction(function () use ($data) {
            $major = Major::create([
                'code' => strtoupper($data['code']),
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'is_active' => $data['is_active'] ?? true,
            ]);

            // Business logic spesifik Major di sini
            // Contoh: event(new MajorCreated($major));

            return $major;
        });
    }
}