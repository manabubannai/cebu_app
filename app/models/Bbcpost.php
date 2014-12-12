<?php
class Bbcpost extends Eloquent
{

	protected $table = 'bbcposts';

	public function Bbccomments(){
		// 投稿はたくさんのコメントを持つ
		return $this->hasMany('Bbccomment', 'post_id');
	}

	public function Bbccategory(){
		// 投稿は1つのカテゴリーに属する
		return $this->belongsTo('Bbccategory','cat_id');
	}

}