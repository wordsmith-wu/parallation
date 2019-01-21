<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration 
{
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('paragraph_id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->text('comment');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('comments');
	}
}
