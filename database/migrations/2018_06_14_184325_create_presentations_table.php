<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->nullable()->unique()->index();
            $table->text('body');
            $table->string('icon');
            $table->integer('status')->nullable();
            $table->integer('color_id')->nullable();
            $table->string('image')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('presentation_colors', function (Blueprint $table) {
            $table->integer('presentation_id')->unsigned()->index();
            $table->integer('color_id')->unsigned()->index();
            $table->foreign('presentation_id')->references('id')->on('presentations')->onDelete('cascade');
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
        Schema::dropIfExists('presentations');

        Schema::dropIfExists('presentations_colors');
    }
}
