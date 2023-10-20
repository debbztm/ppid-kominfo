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
        Schema::create('ma_official_profile_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ma_official_profile_id');
            $table->foreign('ma_official_profile_id')->references('id')
                ->on('ma_official_profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('position');
            $table->string('rank');
            $table->string('nip');
            $table->string('education');
            $table->text('diklat');
            $table->text('lhkpn');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_official_profile_lists');
    }
};
