<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',256);
            $table->string('category',100)->nullable();
            $table->string('tag',100)->nullable();
            $table->string('slug',100);
            $table->text('body');
            $table->boolean('status')->nullable();
            $table->string('image')->nullable();
            $table->string('color_category')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('posts');
    }
}
