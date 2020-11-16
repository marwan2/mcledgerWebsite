<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $guarded = [];

    public static $rules = [
        'title' => 'min:3|required',
    ];

    public static function url($row) {
        if(!$row) {
            return '#';
        }
        if(!empty($row->slug)) {
            return url('blog/'.$row->slug);
        }
        return url('blog/'.$row->id);
    }

    public static function cat_url($row) {
        if(!$row) {
            return '#';
        }
        if(!empty($row->category->slug)) {
            return url('blog/category/'.$row->category->slug);
        }
        return url('blog/category/'.$row->id);
    }

    public static function tag_url($tag) {
        if(!empty($tag)) {
            return url('blog/tag/'.$tag);
        }
        return '#';
    }
    
    public static function author_url($author) {
        if(!empty($author)) {
            $slug = (!empty($author->slug)) ? $author->slug : $author->id;
            return url('blog/author/'.$slug);
        }

        return '#';
    }

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function author() {
        return $this->belongsTo(BlogAuthor::class, 'author_id');
    }

    public function comments() {
        return $this->hasMany(BlogComment::class, 'record_id')->whereModel('Blog')->orderBy('id','DESC');
    }

    public static function getImage($article, $classes='img-fluid', $default=false, $thumbnail=true)
    {
        $blog_img = $article->image;

        if($thumbnail) {
            $parts = explode('.', $article->image);
            if(!empty($parts) && !empty($parts[1])) {
                $blog_img = $parts[0].'_thumb.'.$parts[1];
            }
        }

        if($blog_img) {
            if(file_exists(public_path('uploads/' .$blog_img))) {
                return '<img src="'.url('uploads/' . $blog_img).'" class="'.$classes.'" alt="'.$article->title.'">';
            }
        }

        if($default) {
            return '<img src="'.url('assets/img/blog_default.png').'" class="'.$classes.'" alt="'.$article->title.'">';
        }

        return '';
    }

    public static function limit($article, $chars=150) {
        return \Str::limit(strip_tags($article->details), $chars);
    }

    public static function date($article) {
        return \Carbon\Carbon::parse($article->created_at)->format('d-F-Y');
    }
}
