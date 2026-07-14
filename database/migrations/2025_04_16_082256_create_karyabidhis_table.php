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
        Schema::create('karyabidhis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arthik_barsa_id')->nullable()->constrained('arthik_barsas')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('title_np');
            $table->string('title_eng')->nullable();
            $table->longText('description')->nullable();

            $table->string('document')->nullable();
            $table->date('miti_bs')->nullable();
            $table->date('miti_ad')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyabidhis');
    }
};
