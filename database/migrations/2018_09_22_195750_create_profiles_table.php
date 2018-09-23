<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('about_profile')->nullable();
            $table->string('contact_profile')->nullable();
            $table->string('login_profile')->nullable();
            $table->string('register_profile')->nullable();
            $table->string('reset-password_profile')->nullable();
            $table->string('testimonial_profile')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
