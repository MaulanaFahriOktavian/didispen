<?php

namespace App\Policies;

use App\Models\Major;
use App\Models\User;

class MajorPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function view(User $user, Major $major): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, Major $major): bool
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Major $major): bool
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Major $major): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Major $major): bool
    {
        return $user->role === 'admin';
    }
}