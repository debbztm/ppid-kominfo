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
        Schema::create('ma_regulation_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_regulation_id');
            $table->foreign('ma_regulation_id')->references('id')
                ->on('ma_regulations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_regulation_files');
    }
};
