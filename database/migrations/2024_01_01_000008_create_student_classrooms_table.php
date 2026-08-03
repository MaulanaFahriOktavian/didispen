<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_classrooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('classroom_id')
                ->constrained('classrooms')
                ->cascadeOnDelete();

            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnDelete();

            $table->foreignId('semester_id')
                ->constrained('semesters')
                ->cascadeOnDelete();

            $table->timestamps();

            // Berikan nama custom yang lebih pendek (maks 64 karakter)
            $table->unique(
                ['student_id', 'academic_year_id', 'semester_id'],
                'sc_student_year_sem_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_classrooms');
    }
};