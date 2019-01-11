<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration 
{
	public function up()
	{
		Schema::create('documents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('paragraphs_count')->unsigned()->default(0);
            $table->integer('words_count')->unsigned()->default(0);
            $table->integer('last_translator_id')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('documents');
	}
}
