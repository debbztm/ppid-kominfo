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
        Schema::create('public_information_news', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("seo");
            $table->longText("description")->nullable();
            $table->string("image")->nullable();
            $table->enum('is_publish', ['Y', 'N'])->default('Y');
            $table->string('username', 50);
            $table->integer("views")->default(0);
            $table->unsignedBigInteger("public_information_id");
            $table->foreign("public_information_id")
                ->references("id")
                ->on("public_information")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_information_news');
    }
};
