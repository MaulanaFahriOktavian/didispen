<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;

class CreateAction
{
    /**
     * Execute the action to create a new classroom.
     *
     * @param array $data
     * @return Classroom
     */
    public function execute(array $data): Classroom
    {
        return Classroom::create($data);
    }
}