<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbccommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bbccomments', function($table){
			$table->increments('id');
			$table->unsignedInteger('post_id'); // ポストテーブルとコメントテーブルの紐付けに利用します
			$table->string('commenter');
			$table->text('comment');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bbccomments');
	}

}
