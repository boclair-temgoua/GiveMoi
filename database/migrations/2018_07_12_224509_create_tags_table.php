<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id') ;
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->nullable();

        });

        Schema::create('article_tag',function (Blueprint $table){
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('tag_id')->nullable()->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('event_tag',function (Blueprint $table){
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('articles')->onDelete('cascade');
            $table->integer('tag_id')->nullable()->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
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
        Schema::dropIfExists('article_tag');
        Schema::dropIfExists('event_tag');
        Schema::dropIfExists('tags');
    }
}
