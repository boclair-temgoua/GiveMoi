<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->string('email')->unique();
            $table->date('birthday')->nullable();
            $table->string('sex', 10)->nullable();
            $table->string('color_name', 10)->nullable()->default('warning');
            $table->string('country', 60)->nullable();
            $table->text('body')->nullable();
            $table->string('password')->nullable();
            $table->integer('status')->nullable();
            $table->string('timezone', 60)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('token')->index()->nullable();
            $table->string('confirmation_token')->nullable();


            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();

            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();


            $table->string('telephone', 50)->nullable();
            $table->string('work', 50)->nullable();
            $table->boolean('avatar')->nullable()->default(false);
            $table->boolean('avatarcover')->nullable()->default(false);



            $table->string('fblink')->nullable();
            $table->string('twlink')->nullable();
            $table->string('instalink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
