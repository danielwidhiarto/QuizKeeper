<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
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
            $table->timestamps();
        });

        DB::statement('ALTER TABLE transactions ADD file_content LONGBLOB');

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('subject_code')->references('subject_code')->on('subjects');
        });

        DB::statement('ALTER TABLE files ADD file_content LONGBLOB');
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['subject_code']);
        });

        Schema::dropIfExists('transactions');
    }
};
