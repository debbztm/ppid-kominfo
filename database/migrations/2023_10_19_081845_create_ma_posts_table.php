<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ma_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_id')->nullable();
            $table->foreign('hall_id')->references('id')
                ->on('halls')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('ma_hall_menu_id')->nullable();
            $table->foreign('ma_hall_menu_id')->references('id')
                ->on('ma_hall_menus')
                ->onUpdate('cascade');
            $table->string('hall_menu');
            $table->string('title');
            $table->string('seo');
            $table->string('description');
            $table->string('image');
            $table->string('link');
            $table->text('tag_post');
            $table->string('day');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('is_hall')->nullable();
            $table->string('username', 50);
            $table->string('phone', 50);
            $table->enum('is_publish', ['Y', 'N'])->default('Y');
            $table->enum('tip', ['0', '1', '2'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_posts');
    }
};
