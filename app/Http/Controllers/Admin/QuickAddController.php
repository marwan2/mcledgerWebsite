<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuickAddController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAuthor()
    {
    	return view('admin.quickadd.author');
    }

    public function getBlogCategory($type='articles')
    {
        return view('admin.blog_categories.create_modal', compact('type'));
    }
    
    public function getBlogAuthor($type='author')
    {
        return view('admin.blog_authors.create_modal', compact('type'));
    }

    public function getBlog($type='category')
    {
    	return view('admin.quickadd.blog.'.$type, compact('type'));
    }
}
