<?php

namespace App\Actions\Major;

use App\Models\Major;
use Illuminate\Support\Facades\DB;

class DeleteAction
{
    /**
     * Soft delete a single major.
     */
    public function destroy(Major $major): void
    {
        $major->delete();
    }

    /**
     * Restore a single soft-deleted major.
     */
    public function restore(int $id): void
    {
        Major::withTrashed()->where('id', $id)->restore();
    }

    /**
     * Soft delete multiple majors.
     */
    public function bulkDestroy(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            Major::whereIn('id', $ids)->delete();
        });
    }

    /**
     * Restore multiple soft-deleted majors.
     */
    public function bulkRestore(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            Major::withTrashed()->whereIn('id', $ids)->restore();
        });
    }
}