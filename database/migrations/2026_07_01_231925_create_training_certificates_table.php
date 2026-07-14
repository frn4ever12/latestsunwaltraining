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
        Schema::create('training_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->foreignId('training_application_id')->constrained()->onDelete('cascade');
            $table->foreignId('training_batch_id')->nullable()->constrained()->onDelete('set null');
            $table->string('certificate_number')->unique();
            $table->date('issue_date');
            $table->string('qr_code')->nullable();
            $table->enum('status', ['issued', 'revoked'])->default('issued');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_certificates');
    }
};
