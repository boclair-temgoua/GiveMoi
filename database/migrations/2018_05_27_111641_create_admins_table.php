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
            $table->string('admin_id')->nullable();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('work', 50)->nullable();
            $table->string('color_name', 10)->nullable()->default('warning');
            $table->longText('body')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender', 10)->nullable();
            $table->boolean('avatar')->nullable()->default(false);
            $table->string('password')->nullable();
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();


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
