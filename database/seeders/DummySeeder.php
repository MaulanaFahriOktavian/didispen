<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Dispensation;
use App\Models\DispensationCategory;
use App\Models\DispensationDestination;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClassroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        $this->command->warn('⚠️  Ini akan membuat data dummy untuk testing.');

        if (! $this->command->confirm('Lanjutkan?', true)) {
            return;
        }

        $this->createDummyStudents(100);
        $this->createDummyTeachers(20);
        $this->createDummyDispensations(500);

        $this->command->info('✅ Data dummy berhasil dibuat.');
    }

    private function createDummyStudents(int $count): void
    {
        $this->command->info("Membuat {$count} siswa dummy...");

        $students = Student::factory()->count($count)->create();

        // Assign siswa ke kelas secara acak
        $classrooms = Classroom::all();
        $activeYear = AcademicYear::where('is_active', true)->first();
        $activeSemester = Semester::where('is_active', true)->first();

        if ($classrooms->isNotEmpty() && $activeYear && $activeSemester) {
            foreach ($students as $student) {
                StudentClassroom::firstOrCreate([
                    'student_id'       => $student->id,
                    'academic_year_id' => $activeYear->id,
                    'semester_id'      => $activeSemester->id,
                ], [
                    'classroom_id' => $classrooms->random()->id,
                ]);
            }
        }
    }

    private function createDummyTeachers(int $count): void
    {
        $this->command->info("Membuat {$count} guru dummy...");

        for ($i = 0; $i < $count; $i++) {
            $user = User::create([
                'username' => 'guru_dummy_' . ($i + 1),
                'password' => Hash::make('password'),
                'role'     => 'guru',
            ]);

            Teacher::create([
                'user_id' => $user->id,
                'name'    => fake()->name(),
                'nip'     => fake()->unique()->numerify('##############'),
                'phone'   => fake()->phoneNumber(),
            ]);
        }
    }

    private function createDummyDispensations(int $count): void
    {
        $this->command->info("Membuat {$count} dispensasi dummy...");

        $students = Student::all();
        $teachers = Teacher::all();
        $categories = DispensationCategory::all();
        $destinations = DispensationDestination::all();
        $activeYear = AcademicYear::where('is_active', true)->first();
        $activeSemester = Semester::where('is_active', true)->first();
        $approvers = User::where('role', 'guru')->get();

        if ($students->isEmpty() || $categories->isEmpty()) {
            $this->command->warn('Data master belum lengkap. Lewati dispensasi dummy.');
            return;
        }

        $statuses = ['pending', 'disetujui', 'ditolak', 'keluar', 'kembali', 'selesai', 'dibatalkan'];

        for ($i = 0; $i < $count; $i++) {
            $isStudent = fake()->boolean(80);
            $status = fake()->randomElement($statuses);

            Dispensation::create([
                'dispensation_number' => Dispensation::generateNumber(),
                'request_type'        => $isStudent ? 'student' : 'teacher',
                'student_id'          => $isStudent ? $students->random()->id : null,
                'teacher_id'          => $isStudent ? null : ($teachers->isNotEmpty() ? $teachers->random()->id : null),
                'academic_year_id'    => $activeYear?->id ?? 1,
                'semester_id'         => $activeSemester?->id ?? 1,
                'category_id'         => $categories->random()->id,
                'destination_id'      => $destinations->isNotEmpty() ? $destinations->random()->id : 1,
                'dispensation_date'   => fake()->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
                'leave_time'          => fake()->time('H:i', '12:00'),
                'return_time'         => $status === 'kembali' || $status === 'selesai' ? fake()->time('H:i', '15:00') : null,
                'reason'              => fake()->sentence(),
                'approved_by'         => in_array($status, ['disetujui', 'keluar', 'kembali', 'selesai']) && $approvers->isNotEmpty()
                    ? $approvers->random()->id
                    : null,
                'approved_at'         => in_array($status, ['disetujui', 'keluar', 'kembali', 'selesai'])
                    ? fake()->dateTimeBetween('-3 months', 'now')
                    : null,
                'status'              => $status,
            ]);
        }
    }
}