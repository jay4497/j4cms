<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad', function(Blueprint $table){
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->integer('width')->default(100);
            $table->integer('height')->default(100);
            $table->integer('position_id')->unsigned()->default(1);
            $table->integer('order')->default(0);
            $table->timestamp('start_show');
            $table->timestamp('end_show');
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
        Schema::drop('ad');
    }
}
