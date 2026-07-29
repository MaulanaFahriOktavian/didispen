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
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('classroom_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('academic_year_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('semester_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->boolean('is_active')->default(true);

            $table->date('promoted_at')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_classrooms');
    }
};