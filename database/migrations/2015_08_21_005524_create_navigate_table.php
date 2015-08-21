<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigate', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->integer('bind_node_id')->unsigned();
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('depth')->default(0);
            $table->string('thread')->default('/');
            $table->tinyInteger('status')->default(1);
            $table->integer('order')->default(0);
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
        Schema::drop('navigate');
    }
}
