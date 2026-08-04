<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class DeleteAction
{
    /**
     * Soft delete a single classroom.
     */
    public function destroy(Classroom $classroom): void
    {
        $classroom->delete();
    }

    /**
     * Restore a single soft-deleted classroom.
     */
    public function restore(int $id): void
    {
        Classroom::withTrashed()->where('id', $id)->restore();
    }

    /**
     * Soft delete multiple classrooms.
     */
    public function bulkDestroy(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            Classroom::whereIn('id', $ids)->delete();
        });
    }

    /**
     * Restore multiple soft-deleted classrooms.
     */
    public function bulkRestore(array $ids): void
    {
        DB::transaction(function () use ($ids) {
            Classroom::withTrashed()->whereIn('id', $ids)->restore();
        });
    }
}