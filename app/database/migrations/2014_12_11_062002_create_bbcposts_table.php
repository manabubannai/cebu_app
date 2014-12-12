<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbcpostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bbcposts', function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('cat_id'); // ポストテーブルとカテゴリーテーブルの紐付けに利用します
			$table->text('content');
			$table->unsignedInteger('comment_count'); // 投稿に何件のコメントがついたのかをカウントします
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
		Schema::drop('bbcposts');
	}

}
