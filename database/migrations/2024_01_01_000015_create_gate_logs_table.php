<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gate_logs', function (Blueprint $table) {
            $table->id();

            // gate_logs adalah child dari dispensations dan users
            $table->foreignId('dispensation_id')
                ->constrained('dispensations')
                ->cascadeOnDelete();

            $table->string('status_before');
            $table->string('status_after');
            $table->string('action');

            $table->foreignId('actor_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->index('action');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gate_logs');
    }
};