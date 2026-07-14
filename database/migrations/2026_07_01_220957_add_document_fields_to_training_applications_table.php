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
        Schema::table('training_applications', function (Blueprint $table) {
            $table->string('passport_copy')->nullable();
            $table->string('educational_certificate')->nullable();
            $table->string('recommendation_letter')->nullable();
            $table->string('disability_certificate')->nullable();
            $table->string('other_documents')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_applications', function (Blueprint $table) {
            $table->dropColumn(['passport_copy', 'educational_certificate', 'recommendation_letter', 'disability_certificate', 'other_documents']);
        });
    }
};
