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
        Schema::create('training_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->string('batch_name');
            $table->string('batch_code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('venue');
            $table->string('trainer_name')->nullable();
            $table->string('trainer_contact')->nullable();
            $table->integer('max_participants')->default(30);
            $table->integer('current_participants')->default(0);
            $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_batches');
    }
};
