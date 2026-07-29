<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {

            $table->id();

            $table->foreignId('major_id')
                ->constrained()
                ->cascadeOnDelete();

            // Tingkat kelas
            $table->tinyInteger('grade');

            // Nama paralel kelas
            $table->string('name',30);

            // Kapasitas siswa
            $table->unsignedSmallInteger('capacity')->default(36);

            // Wali kelas
            $table->foreignId('homeroom_teacher_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};