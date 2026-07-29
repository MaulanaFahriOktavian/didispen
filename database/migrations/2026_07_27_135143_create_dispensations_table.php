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

            /*
            |--------------------------------------------------------------------------
            | Nomor Dispensasi
            |--------------------------------------------------------------------------
            | Contoh:
            | DSP-20260729-0001
            */

            $table->string('code')->unique();

            /*
            |--------------------------------------------------------------------------
            | Pemohon
            |--------------------------------------------------------------------------
            */

            $table->enum('applicant_type', [
                'student',
                'teacher'
            ]);

            $table->unsignedBigInteger('applicant_id');

            /*
            |--------------------------------------------------------------------------
            | Master
            |--------------------------------------------------------------------------
            */

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('destination_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Keperluan
            |--------------------------------------------------------------------------
            */

            $table->date('dispensation_date');

            $table->time('leave_time');

            $table->time('estimated_return_time');

            $table->time('actual_return_time')->nullable();

            $table->text('reason');

            /*
            |--------------------------------------------------------------------------
            | Approval
            |--------------------------------------------------------------------------
            */

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Satpam
            |--------------------------------------------------------------------------
            */

            $table->foreignId('checked_out_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('checked_in_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | QR Code
            |--------------------------------------------------------------------------
            */

            $table->string('qr_token')->nullable()->unique();

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->enum('status',[
                'pending',
                'approved',
                'checked_out',
                'returned',
                'completed',
                'rejected',
                'cancelled'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | Catatan
            |--------------------------------------------------------------------------
            */

            $table->text('rejection_reason')->nullable();

            $table->text('note')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Timestamp
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispensations');
    }
};