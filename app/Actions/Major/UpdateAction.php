<?php

namespace App\Actions\Major;

use App\Models\Major;

class UpdateAction
{
    /**
     * Execute the action to update an existing major.
     *
     * @param Major $major
     * @param array $data
     * @return Major
     */
    public function execute(Major $major, array $data): Major
    {
        $major->update($data);
        
        return $major->fresh();
    }
}