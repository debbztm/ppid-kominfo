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
        Schema::create('ma_image_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_gallery_id')->nullable();
            $table->foreign('ma_gallery_id')->references('id')
                ->on('ma_galleries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_image_galleries');
    }
};
