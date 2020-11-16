<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
	protected $table = 'blog_comments';
    protected $fillable = ['record_id', 'model', 'name', 'email', 'comment'];

    public static $sections = [];

    public function article() {
    	return $this->belongsTo(Blog::class, 'record_id');
    }

}
