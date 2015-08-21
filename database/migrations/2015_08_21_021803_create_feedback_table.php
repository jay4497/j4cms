<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('content');
            $table->string('ip')->nullable();
            $table->string('agent')->nullable();
            $table->tinyInteger('status')->default(0);
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
        //
    }
}
