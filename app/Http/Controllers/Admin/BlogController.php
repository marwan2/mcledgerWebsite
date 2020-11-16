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
use App\Blog;
use App\BlogCategory;
use App\BlogAuthor;
use App\Helper;

class BlogController extends InitController
{
    private $items;
    public function __construct() {
        parent::__construct();

        $this->items = 'blog';
        view()->share('page_title', 'Blog Posts');
        view()->share('single', 'Post');
        view()->share('model_url', $this->items);

        $categories = BlogCategory::pluck('title', 'id');
        View::share('categories', $categories);

        $authors = BlogAuthor::pluck('name', 'id');
        View::share('authors', $authors);
    }

    public function index(Request $req)
    {
        $blog = new Blog;

        if($req->has('category_id') && !empty($req->get('category_id'))) {
            $blog = $blog->whereCategory_id($req->get('category_id'));
        }
        if($req->has('author_id') && !empty($req->get('author_id'))) {
            $blog = $blog->whereAuthor_id($req->get('author_id'));
        }

        $blog = $blog->with('category')->withCount('comments')->orderBy('id', 'DESC')->paginate(7);

        return view('admin.blog.index', compact('blog'));
    }

    public function create() {
        return view('admin.blog.create');
    }

    public function store(Request $request) {
        $this->validate($request, Blog::$rules);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = Helper::upload($request, 'image');
        }

        $data['slug'] = Str::slug($data['title']);

        $article = Blog::create($data);

        Session::flash('flash_message', 'Article has been added'.self::preview($article));
        return redirect('admin/blog');
    }

    public function show($id) {
        $row = Blog::findOrFail($id);
        return view('admin.blog.show', compact('row'));
    }

    public function edit($id) {
        $article = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('article'));
    }

    public function update($id, Request $request) {
        $this->validate($request, Blog::$rules);
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $requestData['image'] = Helper::upload($request, 'image');
        }
        $requestData['slug'] = Str::slug($request->get('title'));
        $article = Blog::findOrFail($id);
        $article->update($requestData);

        Session::flash('flash_message', 'Article has been updated'.self::preview($article));
        return redirect('admin/blog');
    }

    public function destroy($id) {
        $article = Blog::findOrFail($id);
        Blog::destroy($id);

        Session::flash('flash_message', 'Article has been deleted');
        return redirect('admin/blog');
    }

    public static function preview($post) {
        if($post) {
            return ' <br><strong>Preview on Website:</strong> <a href="'.Blog::url($post).'" target="_blank">'.$post->title.'</a>';
        }
    }
}