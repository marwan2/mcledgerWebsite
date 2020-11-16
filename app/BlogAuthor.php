<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
	protected $guarded = [];
	
    public static $rules = [
        'name' => 'min:3|required',
    ];

    public function articles() {
    	return $this->hasMany(Blog::class);
    }
}
