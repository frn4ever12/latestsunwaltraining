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
        Schema::table('user_profiles', function (Blueprint $table) {
            // Drop foreign key constraints for ward fields
            $table->dropForeign(['permanent_ward_id']);
            $table->dropForeign(['temp_ward_id']);
            
            // Change ward fields to plain integers without foreign key
            $table->integer('permanent_ward_id')->nullable()->change();
            $table->integer('temp_ward_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            // Re-add foreign key constraints
            $table->foreignId('permanent_ward_id')->nullable()->constrained('wards')->cascadeOnDelete()->change();
            $table->foreignId('temp_ward_id')->nullable()->constrained('wards')->cascadeOnDelete()->change();
        });
    }
};
