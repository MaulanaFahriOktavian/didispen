<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;

class MajorController extends BaseCrudController
{
    // ==========================================
    // KONFIGURASI ONLY
    // ==========================================
    protected function getModelClass(): string { return Major::class; }
    protected function getResourceName(): string { return 'major'; }
    protected function getPageTitle(): string { return 'Master Major'; }
    protected function getSingularLabel(): string { return 'Major'; }
    protected function getPluralLabel(): string { return 'Majors'; }
    
    protected function getSearchableColumns(): array { return ['code', 'name']; }
    
    protected function getStoreRules(): array
    {
        return [
            'code' => ['required', 'string', 'max:50', 'unique:majors,code'],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    protected function getUpdateRules($id = null): array
    {
        return [
            'code' => ['required', 'string', 'max:50', 'unique:majors,code,' . $id],
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    // ==========================================
    // BUSINESS LOGIC KHUSUS (Optional)
    // ==========================================
    
    protected function beforeCreate(array &$data): void
    {
        // Data cleansing
        $data['code'] = strtoupper(trim($data['code']));
        $data['name'] = ucwords(trim($data['name']));
    }

    protected function beforeUpdate($item, array &$data): void
    {
        // Data cleansing
        $data['code'] = strtoupper(trim($data['code']));
        $data['name'] = ucwords(trim($data['name']));
    }

    protected function beforeDelete($item): void
    {
        (new \App\Actions\Admin\DeleteMajorAction())->validate($item);
    }
}