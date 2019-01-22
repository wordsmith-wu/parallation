<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration 
{
	public function up()
	{
		Schema::create('terms', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('creation_id')->unsigned()->index();
            $table->integer('change_id')->unsigned()->index();
            $table->integer('usagecount')->unsigned();
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->string('source_text');
            $table->string('target_text');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('terms');
	}
}
