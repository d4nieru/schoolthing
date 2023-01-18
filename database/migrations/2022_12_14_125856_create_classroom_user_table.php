<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_user', function (Blueprint $table) {
            $table->id();
            $table->biginteger('classroom_id')->nullable()->unsigned();
            $table->biginteger('user_id')->nullable()->unsigned();
            $table->foreign('classroom_id')->nullable()->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->boolean('isSeniorTeacher')->default(1)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classroom_user', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['isSeniorTeacher']);
        });

        Schema::table('classroom_user', function (Blueprint $table) {
            $table->dropColumn('classroom_id');
            $table->dropColumn('user_id');
            $table->dropColumn('isSeniorTeacher');
        });
        //Schema::dropIfExists('classroom_user');
    }
};
