<?php

namespace Database\Seeders;

use App\Models\DutySchedule;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DutyScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = Teacher::all();

        if ($teachers->isEmpty()) {
            return;
        }

        // Buat jadwal piket untuk minggu ini
        $today = now()->startOfWeek();

        foreach ($teachers as $index => $teacher) {
            // Setiap guru piket 1-2 hari per minggu
            $dutyDay = $today->copy()->addDays($index % 5);

            DutySchedule::firstOrCreate([
                'teacher_id' => $teacher->id,
                'duty_date'  => $dutyDay->toDateString(),
            ], [
                'start_time' => '07:00:00',
                'end_time'   => '15:00:00',
            ]);
        }
    }
}