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
        Schema::create('user_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('education_level_id')->nullable()->constrained('education_levels')->cascadeOnDelete();
            $table->string('faculty_stream')->nullable();
            $table->string('board_university')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('gpa_percentage')->nullable();
            $table->string('certificate_upload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_educations');
    }
};
