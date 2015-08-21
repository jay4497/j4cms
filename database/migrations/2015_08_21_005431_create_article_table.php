<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function(Blueprint $table){
            $table->increments('id');
            $table->integer('node_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->tinyInteger('type');    // inherits form node->content_type
            $table->string('title')->index();
            $table->string('seo_title');
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('image')->nullable();
            $table->text('outline')->nullable();
            $table->text('content')->nullable();
            $table->integer('views')->default(0);
            $table->integer('order')->default(0);
            $table->tinyInteger('status')->default(0)->index();
            $table->tinyInteger('recommend')->default(0)->index();
            $table->tinyInteger('hot')->default(0)->index();
            $table->tinyInteger('show_index')->default(0)->index();
            $table->timestamps();

            $table->foreign('node_id')->references('id')->on('node')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
    }
}
