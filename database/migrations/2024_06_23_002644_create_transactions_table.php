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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('exam_type');
            $table->string('subject_code');
            $table->date('exam_date');
            $table->time('exam_start_time');
            $table->integer('exam_duration');
            $table->string('class');
            $table->string('room');
            $table->string('assistant_initial');
            $table->string('assistant_initial2')->nullable();
            $table->binary('file_content'); // Add this line to store the file content directly
            $table->timestamps();
            $table->foreign('subject_code')->references('subject_code')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
