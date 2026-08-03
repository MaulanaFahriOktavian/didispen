<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // teachers adalah child dari users
            $table->foreignId('user_id')
                ->nullable()
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('nip')->unique();
            $table->string('phone')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('nip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};