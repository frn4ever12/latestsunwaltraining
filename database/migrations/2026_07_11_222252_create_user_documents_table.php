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
        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('passport_size_photo')->nullable();
            $table->string('academic_certificates')->nullable();
            $table->string('experience_certificate')->nullable();
            $table->string('recommendation_letter')->nullable();
            $table->string('disability_card')->nullable();
            $table->string('inclusion_certificate')->nullable();
            $table->string('other_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_documents');
    }
};
