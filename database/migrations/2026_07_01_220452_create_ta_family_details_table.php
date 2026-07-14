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
        Schema::create('ta_family_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_application_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('relationship');
            $table->string('occupation')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ta_family_details');
    }
};
