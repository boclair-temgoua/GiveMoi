<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->longText('comment')->nullable();
            $table->unsignedInteger('parent_id')->default(0);
            $table->boolean('approved')->nullable();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('event_id')->references('id')->on('events')->onDelete('cascade');
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

        Schema::dropIfExists('comments');

    }
}
