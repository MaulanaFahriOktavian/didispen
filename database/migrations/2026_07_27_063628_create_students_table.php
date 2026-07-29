<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('nis')->unique();
            $table->string('nisn')->nullable()->unique();
            
            $table->string('full_name');

            $table->enum('gender', ['L', 'P']);

            $table->string('birth_place');
            $table->date('birth_date');

            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();

            $table->foreignId('major_id')
                ->constrained('majors')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('class_id')
                ->constrained('school_classes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->enum('status', [
                'aktif',
                'lulus',
                'pindah'
            ])->default('aktif');

            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};