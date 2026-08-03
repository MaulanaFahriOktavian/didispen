<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qr_scans', function (Blueprint $table) {
            $table->id();

            // qr_scans adalah child dari dispensations dan users
            $table->foreignId('dispensation_id')
                ->constrained('dispensations')
                ->cascadeOnDelete();

            $table->uuid('qr_token');

            $table->enum('scan_type', ['keluar', 'kembali']);

            $table->foreignId('scanned_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->timestamp('scanned_at');

            $table->timestamps();

            $table->index('qr_token');
            $table->index('scanned_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_scans');
    }
};