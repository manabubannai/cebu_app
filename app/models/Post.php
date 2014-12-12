<?php
class Post extends Eloquent{

	protected $fillable = ['title', 'content', 'category', 'area'];

	public function user(){
		return $this->belongsTo('User');
	}

	public function category(){
		return $this->belongsTo('category', 'cat_id');
	}

}
