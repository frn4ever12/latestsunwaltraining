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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('palika_name');
            $table->string('palika_name_eng')->nullable();
            $table->string('palika_karyalaya');
            $table->string('palika_karyalaya_eng')->nullable();
            $table->foreignId('province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('address_eng')->nullable();
            $table->string('country')->nullable();
            $table->string('country_eng')->nullable();
            $table->string('logo')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
 
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
