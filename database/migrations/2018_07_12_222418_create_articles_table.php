<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('summary')->nullable();
            $table->text('body');
            $table->string('read_time')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('user_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
