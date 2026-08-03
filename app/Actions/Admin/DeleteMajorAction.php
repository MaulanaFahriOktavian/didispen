<?php

namespace App\Actions\Admin;

use App\Models\Major;
use Illuminate\Support\Facades\DB;

class DeleteMajorAction
{
    public function validate(Major $major): void
    {
        if ($major->classrooms()->exists()) {
            throw new \Exception('Cannot delete Major because it is still assigned to one or more classrooms.');
        }
    }

    public function execute(Major $major): bool
    {
        return DB::transaction(fn() => $major->delete());
    }
}