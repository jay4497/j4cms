<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system', function(Blueprint $table){
            $table->increments('id');
            $table->string('web_name');
            $table->string('web_url');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('hotline')->nullable();
            $table->string('copyright')->nullable();
            $table->string('record')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('system');
    }
}
