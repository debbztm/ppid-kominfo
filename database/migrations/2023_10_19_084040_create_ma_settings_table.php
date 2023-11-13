<?php

use App\Models\MaRegulation;
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
        Schema::create('ma_settings', function (Blueprint $table) {
            $table->id();
            $table->string('web_name');
            $table->string('web_description');
            $table->longText('about');
            $table->text('home_text')->nullable();
            $table->string('home_image')->nullable();
            $table->text('home_tag')->nullable();
            $table->text('web_tag');
            $table->string('web_phone');
            $table->string('web_email');
            $table->string('web_address');
            $table->text('maps_location');
            $table->string('web_logo');
            $table->integer('application')->nullable();
            $table->integer('granted')->nullable();
            $table->integer('rejected')->nullable();
            $table->integer('objected')->nullable();
            $table->integer('ikm')->nullable();
            $table->enum('is_online', ['Y', 'N'])->default('Y');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_settings');
    }
};
