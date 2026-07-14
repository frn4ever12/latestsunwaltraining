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
            $table->string('employment_status')->nullable();
            $table->string('profession')->nullable();
            $table->integer('work_experience_years')->nullable();
            $table->string('main_skill')->nullable();
            $table->text('other_skills')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('training_applications', function (Blueprint $table) {
            $table->dropColumn(['employment_status', 'profession', 'work_experience_years', 'main_skill', 'other_skills']);
        });
    }
};
