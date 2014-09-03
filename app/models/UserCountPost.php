<?php

class UserCountPost extends \Eloquent {
	protected $table = "users_count_posts";
	protected $fillable = ['user_id'];

  	public function user()
    	{
        	return $this->belongsTo('User');
    	}
}