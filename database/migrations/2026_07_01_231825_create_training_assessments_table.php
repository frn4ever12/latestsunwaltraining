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
        Schema::create('training_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->foreignId('training_application_id')->constrained()->onDelete('cascade');
            $table->foreignId('training_batch_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('assessment_type', ['pre_test', 'post_test', 'practical']);
            $table->decimal('score', 5, 2);
            $table->decimal('max_score', 5, 2)->default(100);
            $table->decimal('percentage', 5, 2);
            $table->enum('grade', ['A+', 'A', 'B+', 'B', 'C+', 'C', 'D', 'F'])->nullable();
            $table->enum('status', ['passed', 'failed', 'pending'])->default('pending');
            $table->date('assessment_date');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_assessments');
    }
};
