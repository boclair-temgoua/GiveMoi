<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('fullname');
            $table->text('body');
            $table->string('role',40);
            $table->unsignedInteger('list_order')->default(999);
            $table->integer('status')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();


            $table->integer('admin_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
