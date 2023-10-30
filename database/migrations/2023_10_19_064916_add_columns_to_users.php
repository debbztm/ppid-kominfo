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
        Schema::table('users', function (Blueprint $table) {
            /**
             * relation to table roles (role_id > id)
             * relation to table halls (hall_id > id)
             */

            $table->unsignedBigInteger('role_id')->after('password')->default(2);
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('hall_id')->after('password')->nullable();
            $table->foreign('hall_id')->references('id')->on('halls')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropForeign(['hall_id']);
            $table->dropColumn('hall_id');
        });
    }
};
