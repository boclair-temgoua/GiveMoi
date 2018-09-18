<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('country',100)->nullable();
            $table->string('summary')->nullable();
            $table->text('body')->nullable();
            $table->string('city',100);
            $table->string('category')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->default('warning')->nullable();
            $table->string('tag')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->nullable();
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('events');
    }
}
