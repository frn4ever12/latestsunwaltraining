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
        Schema::create('karmacharis', function (Blueprint $table) {
            $table->id();
            $table->string('fullname_np')->nullable();
            $table->string('fullname_eng')->nullable();
            $table->string('padh_np')->nullable();
            $table->string('padh_eng')->nullable();
            $table->string('shakha_np')->nullable();
            $table->string('shakha_eng')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('photo')->nullable();
            $table->string('kaifiyat')->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karmacharis');
    }
};
