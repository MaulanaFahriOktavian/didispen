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

            // Identitas
            $table->string('nis',20)->unique();
            $table->string('nisn',20)->unique();

            $table->string('full_name',150);

            $table->enum('gender',[
                'L',
                'P'
            ]);

            $table->string('birth_place',100);

            $table->date('birth_date');

            $table->text('address')->nullable();

            $table->string('phone',20)->nullable();

            $table->string('email')->nullable();

            // Jurusan
            $table->foreignId('major_id')
                ->constrained()
                ->cascadeOnDelete();

            // Login siswa
            $table->string('password');

            // Status siswa
            $table->enum('status',[
                'aktif',
                'lulus',
                'pindah',
                'keluar'
            ])->default('aktif');

            // Foto
            $table->string('photo')->nullable();

            // Login terakhir
            $table->timestamp('last_login_at')->nullable();

            $table->rememberToken();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};