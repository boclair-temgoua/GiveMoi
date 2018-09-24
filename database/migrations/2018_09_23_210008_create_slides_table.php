<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slidesabouts', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('admin_id')->unsigned()->nullable();
        $table->string('slug')->nullable();
        $table->string('slide_about')->nullable();
        $table->integer('status')->nullable();
        $table->timestamps();

         });


        Schema::create('slidescontacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('slug')->nullable();
            $table->string('slide_contact')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });



        Schema::create('slidestestimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('slug')->nullable();
            $table->string('slide_testimonial')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('slidesabouts');
        Schema::dropIfExists('slidescontacts');
        Schema::dropIfExists('slidestestimonials');
    }
}
