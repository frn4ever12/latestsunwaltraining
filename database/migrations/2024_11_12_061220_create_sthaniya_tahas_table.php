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
        Schema::create('sthaniya_tahas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_eng')->nullable();
            $table->foreignId('district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->boolean('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sthaniya_tahas');
    }
};
