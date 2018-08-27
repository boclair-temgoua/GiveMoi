<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('phone', 50)->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();


            $table->boolean('avatar')->nullable()->default(false);
            $table->string('image')->nullable();
            $table->boolean('status')->nullable();
            $table->string('cellphone', 50)->nullable();
            $table->string('telephone', 50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
