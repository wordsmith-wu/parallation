<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration 
{
	public function up()
	{
		Schema::create('translations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('creation_id')->unsigned()->index();
            $table->integer('change_id')->unsigned()->index();
            $table->integer('usagecount')->unsigned();
            $table->string('source_language');
            $table->string('target_language');
            $table->text('source');
            $table->text('target');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('translations');
	}
}
