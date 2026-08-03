<?php

namespace App\Observers;

use App\Models\Major;

class MajorObserver
{
    public function created(Major $major): void
    {
        // Log activity: "Major {$major->name} created by user"
    }

    public function updated(Major $major): void
    {
        // Log changes
    }

    public function deleted(Major $major): void
    {
        // Log soft delete
    }

    public function restored(Major $major): void
    {
        // Log restore
    }

    public function forceDeleted(Major $major): void
    {
        // Log permanent delete
    }
}