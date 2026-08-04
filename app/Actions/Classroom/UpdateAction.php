<?php

namespace App\Actions\Classroom;

use App\Models\Classroom;

class UpdateAction
{
    /**
     * Execute the action to update an existing classroom.
     *
     * @param Classroom $classroom
     * @param array $data
     * @return Classroom
     */
    public function execute(Classroom $classroom, array $data): Classroom
    {
        $classroom->update($data);
        
        return $classroom->fresh();
    }
}