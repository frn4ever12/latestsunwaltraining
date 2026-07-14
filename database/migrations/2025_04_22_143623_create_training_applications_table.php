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
        Schema::create('training_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arthik_barsa_id')->nullable()->constrained('arthik_barsas')->cascadeOnDelete();
            $table->string('application_no')->unique()->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('training_id')->constrained('trainings')->cascadeOnDelete();
            $table->string('fullname_np');
            $table->string('fullname_eng')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->date('dob_bs')->nullable();
            $table->date('dob_ad')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('nagrita_copy_front')->nullable();
            $table->string('nagrita_copy_back')->nullable();
            $table->string('photo')->nullable();

            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->date('application_miti_bs')->nullable();
            $table->foreignId('citizenship_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->string('remarks')->nullable();

            $table->enum('status', ['processing', 'approved', 'declined'])->default('processing');
            $table->timestamps();
        });
        Schema::create('ta_thegana_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_application_id')->constrained('training_applications')->cascadeOnDelete();
            $table->foreignId('sthyayi_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('sthyayi_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('sthyayi_sthaniya_taha_id')->nullable()->constrained('sthaniya_tahas')->cascadeOnDelete();
            $table->foreignId('sthyayi_ward_id')->nullable()->constrained('wards')->cascadeOnDelete();
            $table->string('sthyayi_tole_name')->nullable();
            $table->foreignId('asthyayi_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('asthyayi_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('asthyayi_sthaniya_taha_id')->nullable()->constrained('sthaniya_tahas')->cascadeOnDelete();
            $table->foreignId('asthyayi_ward_id')->nullable()->constrained('wards')->cascadeOnDelete();
            $table->string('asthyayi_tole_name')->nullable();
            $table->string('migration_certificate')->nullable();
            $table->timestamps();
        });
        Schema::create('ta_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_application_id')->constrained('training_applications')->cascadeOnDelete();
            $table->foreignId('education_level_id')->nullable()->constrained('education_levels')->cascadeOnDelete();
            $table->string('institution_name')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('field_of_study')->nullable();
            $table->enum('result_type', ['grade', 'percentage'])->nullable();
            $table->string('result_score')->nullable();
            $table->string('marksheet')->nullable();
            $table->string('equivalency_certificate')->nullable();
            $table->string('character_certificate')->nullable();
            $table->timestamps();
        });

        Schema::create('ta_experience_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_application_id')->constrained('training_applications')->cascadeOnDelete();
            $table->string('sanstha_name')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->date('start_miti_bs')->nullable();
            $table->date('start_miti_ad')->nullable();
            $table->date('end_miti_bs')->nullable();
            $table->date('end_miti_ad')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });

        Schema::create('ta_anye_bibaran_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_application_id')->constrained('training_applications')->cascadeOnDelete();
            $table->string('chalani_no')->nullable();
            $table->string('document_name')->nullable();
            $table->string('anye_document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_applications');
        Schema::dropIfExists('ta_thegana_details');
        Schema::dropIfExists('ta_education_details');
        Schema::dropIfExists('ta_experience_details');
        Schema::dropIfExists('ta_anye_bibaran_details');
    }
};
