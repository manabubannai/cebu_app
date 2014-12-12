<?php
class Bbccomment extends Eloquent
{
	protected $table = 'bbccomments';

	public function Post()
	{
	    return $this->belongsTo('Bbcpost');
	}
}