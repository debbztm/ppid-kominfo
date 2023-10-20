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
        Schema::create('ma_slides', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->string('title', 50);
            $table->string('image');
            $table->string('link')->nullable();
            $table->enum('is_publish', ['Y', 'N'])->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_slides');
    }
};
