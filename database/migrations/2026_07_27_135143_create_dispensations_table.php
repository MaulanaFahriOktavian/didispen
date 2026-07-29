<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispensations', function (Blueprint $table) {

            $table->id();

            // Nomor Surat
            $table->string('code')->unique();

            // UUID untuk QR
            $table->uuid('uuid')->unique();

            // Relasi
            $table->foreignId('student_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId('category_id')->constrained('dispensation_categories')->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId('destination_id')->constrained('dispensation_destinations')->cascadeOnUpdate()->restrictOnDelete();

            $table->foreignId('approved_by')->nullable()->constrained('users')->cascadeOnUpdate()->restrictOnDelete();

            $table->text('purpose');

            $table->text('description')->nullable();

            $table->date('dispensation_date');

            $table->time('exit_plan');

            $table->time('return_plan');

            // Waktu Real
            $table->timestamp('exit_at')->nullable();

            $table->timestamp('return_at')->nullable();

            // Approval
            $table->timestamp('approved_at')->nullable();

            $table->text('teacher_note')->nullable();

            // PDF
            $table->string('pdf_file')->nullable();

            // Status
            $table->enum('status',[
                'pending',
                'approved',
                'out',
                'back',
                'finished',
                'rejected',
                'cancelled'
            ])->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispensations');
    }
};
