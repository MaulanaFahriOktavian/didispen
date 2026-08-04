<?php

namespace App\Actions\Major;

use App\Models\Major;

class CreateAction
{
    /**
     * Execute the action to create a new major.
     *
     * @param array $data
     * @return Major
     */
    public function execute(array $data): Major
    {
        return Major::create($data);
    }
}