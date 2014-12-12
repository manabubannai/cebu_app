<?php
class Category extends Eloquent{

	public function posts(){
		return $this->hasMany('post', 'cat_id');
	}

}
