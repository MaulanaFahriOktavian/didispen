<?php

use App\Models\Student;
use App\Models\User;

if (! function_exists('current_user')) {
    /**
     * Get current authenticated user (from any guard)
     */
    function current_user(): User|Student|null
    {
        return auth('web')->user() ?? auth('student')->user();
    }
}

if (! function_exists('current_role')) {
    /**
     * Get current user role
     */
    function current_role(): ?string
    {
        if (auth('web')->check()) {
            return auth('web')->user()->role;
        }

        if (auth('student')->check()) {
            return 'siswa';
        }

        return null;
    }
}

if (! function_exists('is_student')) {
    /**
     * Check if current user is student
     */
    function is_student(): bool
    {
        return auth('student')->check();
    }
}

if (! function_exists('is_admin')) {
    /**
     * Check if current user is admin
     */
    function is_admin(): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'admin';
    }
}

if (! function_exists('is_guru')) {
    /**
     * Check if current user is guru
     */
    function is_guru(): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'guru';
    }
}

if (! function_exists('is_satpam')) {
    /**
     * Check if current user is satpam
     */
    function is_satpam(): bool
    {
        return auth('web')->check() && auth('web')->user()->role === 'satpam';
    }
}