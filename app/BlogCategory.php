<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';
    protected $guarded = [];

    public static $rules = [
    	'title'=>'required|max:150',
    ];

    public function articles() {
        return $this->hasMany(Blog::class, 'category_id');
    }

    public static function url($row) {
        if(!$row) {
            return '#';
        }
        if(!empty($row->slug)) {
            return url('blog/category/'.$row->slug);
        }
        return url('blog/category/'.$row->id);
    }
}
