<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->string('subject_code')->primary();
            $table->string('subject_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
