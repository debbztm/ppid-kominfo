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
        Schema::create('ma_main_regulations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_regulation_category_id');
            $table->foreign('ma_regulation_category_id')->references('id')
                ->on('ma_regulation_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title');
            $table->string('about');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_main_regulations');
    }
};
