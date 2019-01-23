<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration 
{
	public function up()
	{
		Schema::create('translations', function(Blueprint $table) {
            $table->increments('id');
            // $table->integer('creationid')->unsigned()->index();
            $table->string('creationid')->index();
            $table->string('changeid')->index();
            $table->integer('usagecount')->unsigned();
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->text('source');
            $table->text('target');
            $table->string('lastusagedate');
            $table->string('creationdate');
            $table->string('changedate');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('translations');
	}
}
