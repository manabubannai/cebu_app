<?php
class Category extends Eloquent{

	protected $fillable = ['name'];

	public function posts(){
		return $this->hasMany('post', 'cat_id');
	}

}
