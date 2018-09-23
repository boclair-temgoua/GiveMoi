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
        Schema::create('slides_about_pages', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('admin_id')->unsigned()->nullable();
        $table->string('slide_about')->nullable();
        $table->integer('status')->nullable();
        $table->timestamps();

         });


        Schema::create('slides_contact_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->string('slide_contact_page')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });



        Schema::create('slides_testimonial_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->nullable();
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
        Schema::dropIfExists('slides_contact_pages');
        Schema::dropIfExists('slides_about_pages');
        Schema::dropIfExists('slides_testimonial_pages');
    }
}
