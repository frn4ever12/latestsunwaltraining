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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            
            // Personal Information (25%)
            $table->string('full_name_en')->nullable();
            $table->string('full_name_np')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('dob_bs')->nullable();
            $table->date('dob_ad')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->string('national_id_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->string('blood_group')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('alternative_mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('passport_photo')->nullable();
            
            // Address Information (20%)
            $table->foreignId('permanent_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('permanent_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('permanent_municipality_id')->nullable()->constrained('sthaniya_tahas')->cascadeOnDelete();
            $table->foreignId('permanent_ward_id')->nullable()->constrained('wards')->cascadeOnDelete();
            $table->string('permanent_tole')->nullable();
            $table->string('permanent_house_no')->nullable();
            $table->string('permanent_postal_code')->nullable();
            $table->boolean('temp_same_as_permanent')->default(false);
            $table->foreignId('temp_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('temp_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('temp_municipality_id')->nullable()->constrained('sthaniya_tahas')->cascadeOnDelete();
            $table->foreignId('temp_ward_id')->nullable()->constrained('wards')->cascadeOnDelete();
            $table->string('temp_tole')->nullable();
            $table->string('temp_house_no')->nullable();
            $table->string('temp_postal_code')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
