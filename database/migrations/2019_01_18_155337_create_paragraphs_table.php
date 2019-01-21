<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagraphsTable extends Migration 
{
	public function up()
	{
		Schema::create('paragraphs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned()->index();
            $table->text('content')->length(5000);
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->text('translation')->length(5000)->nullable();
            $table->integer('translator_id')->unsigned()->nullable();
            $table->integer('proofread_id')->unsigned()->nullable();
            $table->integer('flag')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('paragraphs');
	}
}
