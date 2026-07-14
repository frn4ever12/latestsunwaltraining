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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->string('tole')->nullable();
            $table->unsignedBigInteger('highest_education')->nullable();
            $table->string('institution')->nullable();
            $table->string('main_skill')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('other_skills')->nullable();
            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('educational_certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'province_id',
                'district_id',
                'municipality_id',
                'ward_id',
                'tole',
                'highest_education',
                'institution',
                'main_skill',
                'experience_years',
                'other_skills',
                'citizenship_front',
                'citizenship_back',
                'educational_certificate'
            ]);
        });
    }
};
