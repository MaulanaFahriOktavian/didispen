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

            // students berdiri sendiri, TIDAK memiliki user_id
            $table->string('nis')->unique();
            $table->string('name');
            $table->date('birth_date');
            $table->enum('gender', ['L', 'P']);

            $table->timestamps();
            $table->softDeletes();

            $table->index('nis');
            $table->index('birth_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};