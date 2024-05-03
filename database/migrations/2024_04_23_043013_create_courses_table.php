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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('file');
            $table->integer('view_count')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->float('rating')->default(0);
            $table->time('duration')->nullable();
            $table->integer('source_id');
            $table->timestamp('validated_at')->nullable();
            $table->foreignId('created_by_id')->constrained('users');
            $table->foreignId('is_currently_checked_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
