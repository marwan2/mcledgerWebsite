<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Session;
use View;
use Image;
use File;
use Str;
use App\BlogCategory;
use App\Helper;

class BlogCategoriesController extends InitController
{
    private $items;

    public function __construct() {
        parent::__construct();

        $this->items = 'blog_categories';
        view()->share('page_title', 'Blog Categories');
        view()->share('single', 'Category');
        view()->share('model_url', $this->items);
    }

    public function index(Request $req) {
        $blog_categories = new BlogCategory;
        $blog_categories = $blog_categories->orderBy('id', 'DESC')->get();
        return view('admin.blog_categories.index', compact('blog_categories'));
    }

    public function create() {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request) {
        $this->validate($request, BlogCategory::$rules);

        $data = $request->all();            
        $data['slug'] = Str::slug($data['title']);

        $cat = BlogCategory::create($data);

        if($request->ajax()) {
            return json_encode(['status'=>'success', 'data'=>$cat]);
        }
        Session::flash('flash_message', 'Record added');
        return redirect('admin/blog_categories');
    }

    public function show($id) {
        $row = BlogCategory::findOrFail($id);
        return view('admin.blog_categories.show', compact('row'));
    }

    public function edit($id) {
        $record = BlogCategory::findOrFail($id);
        return view('admin.blog_categories.edit', compact('record'));
    }

    public function update($id, Request $request) {
        $this->validate($request, BlogCategory::$rules);
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($request->get('title'));
        $article = BlogCategory::findOrFail($id);
        $article->update($requestData);

        Session::flash('flash_message', 'Record updated');
        return redirect('admin/blog_categories');
    }

    public function destroy($id) {
        $article = BlogCategory::findOrFail($id);
        BlogCategory::destroy($id);

        Session::flash('flash_message', 'Record deleted');
        return redirect('admin/blog_categories');
    }
}