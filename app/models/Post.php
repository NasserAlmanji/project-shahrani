<?php

class Post extends \Eloquent {
	protected $fillable = [];
 	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
}