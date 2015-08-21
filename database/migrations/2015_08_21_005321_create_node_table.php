<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->string('path')->nullable();
            $table->tinyInteger('show_type')->default(0)->index();
            $table->tinyInteger('content_type')->default(0)->index();
            $table->string('url')->nullable();
            $table->integer('order')->default(0);
            $table->integer('parent_id')->default(0);
            $table->integer('depth')->default(0)->index();
            $table->string('thread')->default('/');
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
        Schmea::drop('node');
    }
}
