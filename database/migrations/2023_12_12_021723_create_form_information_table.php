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
        Schema::create('form_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->string('email');
            $table->string('image')->nullable();
            $table->longText('information')->nullable();
            $table->enum("type", ["request", "objection", "complaint", "satisfaction"]);

            // FOR REQUEST TYPE
            $table->string("purpose")->nullable();
            $table->string("howtoget_information")->nullable();
            $table->string("howtocopy_information")->nullable();

            // FOR OBJECTION TYPE
            $table->string("description")->nullable();
            $table->string("reason")->nullable();

            // FOR COMPLAINT TYPE
            $table->string("nameof_reported")->nullable();
            $table->enum("witness", ["Y", "N"])->nullable();
            $table->longText("reported_identity")->nullable();

            // FOT SATISFACTION TYPE
            $table->date('date')->nullable();
            $table->string("typeof_service")->nullable();
            $table->string("evaluation1")->nullable();
            $table->string("evaluation2")->nullable();
            $table->string("evaluation3")->nullable();
            $table->string("evaluation4")->nullable();
            $table->string("evaluation5")->nullable();
            $table->string("evaluation6")->nullable();
            $table->string("evaluation7")->nullable();
            $table->string("evaluation8")->nullable();
            $table->string("evaluation9")->nullable();
            $table->string("evaluation10")->nullable();
            $table->string("suggestion")->nullable();

            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_information');
    }
};
