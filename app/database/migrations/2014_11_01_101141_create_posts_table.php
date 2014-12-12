<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			$table->unsignedInteger('author_id');

			$table->string('title');
			$table->string('read_more');
			$table->text('content');

			$table->string('image');
			$table->integer('price');
			$table->string('cat_id');
			$table->string('area');

			$table->timestamps();
			$table->engine = 'MyISAM';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
