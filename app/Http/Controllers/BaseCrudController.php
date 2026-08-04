<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class BaseCrudController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Helper to handle flash messages consistently.
     */
    protected function flashSuccess(string $message): void
    {
        session()->flash('success', $message);
    }

    protected function flashError(string $message): void
    {
        session()->flash('error', $message);
    }

    /**
     * Helper to handle bulk action validation.
     */
    protected function validateBulkIds(array $ids): void
    {
        if (empty($ids) || !is_array($ids)) {
            abort(400, 'Invalid bulk action data.');
        }
    }
}