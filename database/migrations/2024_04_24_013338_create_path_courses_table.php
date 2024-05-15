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
        Schema::create('path_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('path_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('path_id')->references('id')->on('learning_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('path_courses');
    }
};
