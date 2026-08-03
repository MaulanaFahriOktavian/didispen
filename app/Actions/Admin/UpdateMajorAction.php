<?php

namespace App\Actions\Admin;

use App\Models\Major;
use Illuminate\Support\Facades\DB;

class UpdateMajorAction
{
    public function execute(Major $major, array $data): Major
    {
        return DB::transaction(function () use ($major, $data) {
            $major->update([
                'code' => strtoupper($data['code']),
                'name' => $data['name'],
                'description' => $data['description'] ?? $major->description,
                'is_active' => $data['is_active'] ?? $major->is_active,
            ]);

            return $major->fresh();
        });
    }
}