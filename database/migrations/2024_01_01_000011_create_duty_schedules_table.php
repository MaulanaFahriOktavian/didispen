<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('duty_schedules', function (Blueprint $table) {
            $table->id();

            // duty_schedules adalah child dari teachers
            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->cascadeOnDelete();

            $table->date('duty_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
            $table->softDeletes();

            $table->index('duty_date');
            $table->index(['teacher_id', 'duty_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('duty_schedules');
    }
};