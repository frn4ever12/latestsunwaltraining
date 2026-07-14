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
            $table->string('grandfather_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->unsignedBigInteger('citizenship_district_id')->nullable();
            $table->string('nagrita_copy_front')->nullable();
            $table->string('nagrita_copy_back')->nullable();
            $table->string('mobile_no')->nullable();
            $table->unsignedBigInteger('sthyayi_province_id')->nullable();
            $table->unsignedBigInteger('sthyayi_district_id')->nullable();
            $table->unsignedBigInteger('sthyayi_sthaniya_taha_id')->nullable();
            $table->unsignedBigInteger('sthyayi_ward_id')->nullable();
            $table->string('sthyayi_tole_name')->nullable();
            // Education fields
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('result_type')->nullable();
            $table->string('result_score')->nullable();
            $table->string('marksheet')->nullable();
            $table->string('character_certificate')->nullable();
            // Experience fields
            $table->string('sanstha_name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('start_miti_bs')->nullable();
            $table->string('start_miti_ad')->nullable();
            $table->string('end_miti_bs')->nullable();
            $table->string('end_miti_ad')->nullable();
            $table->string('experience_document')->nullable();
            // Others fields
            $table->string('chalani_no')->nullable();
            $table->string('document_name')->nullable();
            $table->string('anye_document')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'grandfather_name',
                'father_name',
                'mother_name',
                'citizenship_no',
                'citizenship_district_id',
                'nagrita_copy_front',
                'nagrita_copy_back',
                'mobile_no',
                'sthyayi_province_id',
                'sthyayi_district_id',
                'sthyayi_sthaniya_taha_id',
                'sthyayi_ward_id',
                'sthyayi_tole_name',
                'education_level_id',
                'institution_name',
                'field_of_study',
                'passed_year',
                'result_type',
                'result_score',
                'marksheet',
                'character_certificate',
                'sanstha_name',
                'category_id',
                'start_miti_bs',
                'start_miti_ad',
                'end_miti_bs',
                'end_miti_ad',
                'experience_document',
                'chalani_no',
                'document_name',
                'anye_document',
            ]);
        });
    }
};
