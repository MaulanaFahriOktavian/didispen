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

            $table->foreignId('user_id')
                ->nullable()
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('major_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('classroom_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('nis')->unique();
            $table->string('nisn')->nullable()->unique();

            $table->string('full_name');

            $table->enum('gender', ['L','P']);

            $table->date('birth_date');

            $table->string('phone')->nullable();

            $table->string('email')->nullable()->unique();

            $table->enum('status',[
                'aktif',
                'lulus',
                'keluar'
            ])->default('aktif');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};