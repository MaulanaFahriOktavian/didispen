<?php

namespace Database\Factories;

use App\Models\DutySchedule;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class DutyScheduleFactory extends Factory
{
    protected $model = DutySchedule::class;

    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::factory(),
            'duty_date'  => fake()->date('Y-m-d', '+30 days'),
            'start_time' => '07:00:00',
            'end_time'   => '15:00:00',
        ];
    }
}