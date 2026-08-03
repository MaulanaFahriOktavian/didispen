<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use App\Models\Dispensation;
use App\Models\DispensationCategory;
use App\Models\DispensationDestination;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispensationFactory extends Factory
{
    protected $model = Dispensation::class;

    public function definition(): array
    {
        $isStudent = fake()->boolean(70);

        return [
            'dispensation_number' => Dispensation::generateNumber(),
            'request_type'        => $isStudent ? 'student' : 'teacher',
            'student_id'          => $isStudent ? Student::factory() : null,
            'teacher_id'          => $isStudent ? null : Teacher::factory(),
            'academic_year_id'    => AcademicYear::factory(),
            'semester_id'         => Semester::factory(),
            'category_id'         => DispensationCategory::factory(),
            'destination_id'      => DispensationDestination::factory(),
            'dispensation_date'   => fake()->date(),
            'leave_time'          => fake()->time('H:i'),
            'return_time'         => null,
            'reason'              => fake()->sentence(),
            'status'              => 'pending',
        ];
    }

    public function student(): static
    {
        return $this->state(fn () => [
            'request_type' => 'student',
            'student_id'   => Student::factory(),
            'teacher_id'   => null,
        ]);
    }

    public function teacher(): static
    {
        return $this->state(fn () => [
            'request_type' => 'teacher',
            'student_id'   => null,
            'teacher_id'   => Teacher::factory(),
        ]);
    }

    public function approved(): static
    {
        return $this->state(fn () => [
            'status'       => 'disetujui',
            'approved_at'  => now(),
        ]);
    }
}