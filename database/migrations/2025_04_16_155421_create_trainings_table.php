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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arthik_barsa_id')->nullable()->constrained('arthik_barsas')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete();
            $table->string('name_np');
            $table->string('name_eng')->nullable();
            $table->string('institution_name_np')->nullable();
            $table->string('institution_name_eng')->nullable();
            $table->string('trainer_name_np')->nullable();
            $table->string('trainer_name_eng')->nullable();
            $table->longText('description')->nullable();

            $table->string('document')->nullable();
         
            $table->foreignId('province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('sthaniya_taha_id')->nullable()->constrained('sthaniya_tahas')->cascadeOnDelete();
            $table->foreignId('ward_id')->nullable()->constrained('wards')->cascadeOnDelete();
            $table->string('tole_name')->nullable();
            
            $table->json('target_groups')->nullable();
            $table->json('preferences')->nullable();
            $table->foreignId('budget_bibaran_id')->nullable()->constrained('budget_bibarans')->cascadeOnDelete();
            $table->string('budget')->nullable();
            $table->string('training_cost')->nullable()->default('free');
            $table->string('available_seats')->nullable();
            $table->string('min_age')->nullable();
            $table->string('max_age')->nullable();
            
            $table->string('contact_no')->nullable();
            $table->text('training_location')->nullable();
            
            $table->date('application_start_miti_bs')->nullable();
            $table->date('application_start_miti_ad')->nullable();
            $table->date('application_deadline_miti_bs')->nullable();
            $table->date('application_deadline_miti_ad')->nullable();

            
            $table->date('start_miti_bs')->nullable();
            $table->date('start_miti_ad')->nullable();
            $table->date('end_miti_bs')->nullable();
            $table->date('end_miti_ad')->nullable();
            
            $table->time('start_samaya')->nullable();
            $table->time('end_samaya')->nullable();

            $table->string('kaifiyat')->nullable();
            $table->enum('status',['active','completed','upcoming','dismissed'])->default('upcoming');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
