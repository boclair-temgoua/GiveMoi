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
            $table->string('name');
            $table->string('username')->unique();
            $table->string('lastname')->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->string('email')->unique();
            $table->text('body')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('confirmation_token')->nullable();

            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();


            $table->string('telephone', 50)->nullable();
            $table->string('work', 50)->nullable();
            $table->boolean('avatar')->nullable()->default(false);
            $table->boolean('avatarcover')->nullable()->default(false);
            $table->string('gender', 10)->nullable();


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