<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration 
{
	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('source_language_id')->unsigned();
            $table->integer('target_language_id')->unsigned();
            $table->string('url');
            $table->string('path');
            $table->string('download_url')->nullable();
            $table->integer('paragraphs_count')->unsigned()->default(0);
            $table->integer('words_count')->unsigned()->default(0);
            $table->string('type');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->integer('status')->unsigned()->default(0);
            $table->integer('completed')->unsigned()->default(0);
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('files');
	}
}
