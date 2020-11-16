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
use App\BlogAuthor;
use App\Helper;

class BlogAuthorsController extends InitController
{
    private $items;

    public function __construct() {
        parent::__construct();

        $this->items = 'comments';
        view()->share('page_title', 'Blog Authors');
        view()->share('single', 'Author');
        view()->share('model_url', $this->items);
    }

    public function index(Request $req)
    {
        $blog_authors = new BlogAuthor;
        $blog_authors = $blog_authors->orderBy('id', 'DESC')->get();
        return view('admin.blog_authors.index', compact('blog_authors'));
    }

    public function create() {
        return view('admin.blog_authors.create');
    }

    public function store(Request $request) {
        $this->validate($request, BlogAuthor::$rules);

        $data = $request->all();            
        if ($request->hasFile('image')) {
            $data['image'] = Helper::upload($request, 'image');
        }
        $data['slug'] = Str::slug($data['name']);

        $author = BlogAuthor::create($data);

        if($request->ajax()) {
            return json_encode(['status'=>'success', 'data'=>$author]);
        }

        Session::flash('flash_message', 'Record added');
        return redirect('admin/blog_authors');
    }

    public function show($id) {
        $row = BlogAuthor::findOrFail($id);
        return view('admin.blog_authors.show', compact('row'));
    }

    public function edit($id) {
        $article = BlogAuthor::findOrFail($id);
        return view('admin.blog_authors.edit', compact('article'));
    }

    public function update($id, Request $request) {
        $this->validate($request, BlogAuthor::$rules);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $requestData['image'] = Helper::upload($request, 'image');
        }
        $requestData['slug'] = Str::slug($request->get('name'));
        $article = BlogAuthor::findOrFail($id);
        $article->update($requestData);

        Session::flash('flash_message', 'Record updated');
        return redirect('admin/blog_authors');
    }

    public function destroy($id) {
        $article = BlogAuthor::findOrFail($id);
        BlogAuthor::destroy($id);

        Session::flash('flash_message', 'Record deleted');
        return redirect('admin/blog_authors');
    }
}