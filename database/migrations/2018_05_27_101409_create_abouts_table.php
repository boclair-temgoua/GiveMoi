<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('fullname')->unique();
            $table->string('slug')->nullable();
            $table->text('body');
            $table->string('role');
            $table->string('fblink')->nullable();
            $table->string('googlelink')->nullable();
            $table->string('instlink')->nullable();
            $table->string('twlink')->nullable();
            $table->string('linklink')->nullable();
            $table->string('dribbblelink')->nullable();
            $table->string('avatar')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
