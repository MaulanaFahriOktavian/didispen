<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dispensations', function (Blueprint $table) {
            $table->id();

            $table->string('dispensation_number')->unique();

            // Tipe pemohon
            $table->enum('request_type', ['student', 'teacher']);

            // dispensations adalah child dari students, teachers, academic_years, semesters, categories, destinations, users
            $table->foreignId('student_id')
                ->nullable()
                ->constrained('students')
                ->nullOnDelete();

            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained('teachers')
                ->nullOnDelete();

            $table->foreignId('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnDelete();

            $table->foreignId('semester_id')
                ->constrained('semesters')
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained('dispensation_categories')
                ->cascadeOnDelete();

            $table->foreignId('destination_id')
                ->constrained('dispensation_destinations')
                ->cascadeOnDelete();

            // Detail dispensasi
            $table->date('dispensation_date');
            $table->time('leave_time')->nullable();
            $table->time('return_time')->nullable();
            $table->text('reason');

            // Approval (approved_by merujuk ke users - guru piket yang mengapprove)
            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->text('approval_note')->nullable();

            // QR Token (UUID) - hanya untuk dispensasi siswa
            $table->uuid('qr_token')->nullable()->unique();

            // PDF Path
            $table->string('pdf_path')->nullable();

            // Check-out / Check-in
            $table->timestamp('checked_out_at')->nullable();
            $table->timestamp('checked_in_at')->nullable();

            // Status
            $table->string('status')->default('pending');

            $table->timestamps();
            $table->softDeletes();

            // Index untuk performa pencarian
            $table->index('dispensation_number');
            $table->index('request_type');
            $table->index('dispensation_date');
            $table->index('status');
            $table->index(['request_type', 'status']);
            $table->index(['student_id', 'dispensation_date']);
            $table->index(['teacher_id', 'dispensation_date']);
            $table->index(['academic_year_id', 'semester_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispensations');
    }
};