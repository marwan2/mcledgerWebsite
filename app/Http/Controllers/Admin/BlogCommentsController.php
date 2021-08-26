<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Session;
use View;
use File;
use App\BlogComment;
use App\Helper;

class BlogCommentsController extends InitController
{
    private $items;
    public function __construct() {
        parent::__construct();

        $this->items = 'comments';
        view()->share('page_title', 'Blog Comments');
        view()->share('single', 'Comment');
        view()->share('model_url', $this->items);

        $sections = BlogComment::$sections;
        View::share('sections', $sections);
    }

    public function index(Request $req)
    {
        $comments = new BlogComment;

        if($req->has('record_id') && !empty($req->get('record_id'))) {
            $comments = $comments->whereRecord_id($req->get('record_id'));
        }

        $comments = $comments->with('article');
        $comments = $comments->orderBy('id', 'DESC');
        $comments = $comments->paginate(10);

        return view('admin.blog_comments.index', compact('comments'));
    }

    public function create() {
        return view('admin.blog_comments.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        $comment = BlogComment::create($data);

        Session::flash('flash_message', 'تم اضافة الصفحة بنجاح');
        return redirect('admin/blog_comments');
    }

    public function show($id) {
        $comment = BlogComment::findOrFail($id);
        return view('admin.blog_comments.show', compact('comment'));
    }

    public function edit($id) {
        $comment = BlogComment::findOrFail($id);
        return view('admin.blog_comments.edit', compact('comment'));
    }

    public function update($id, Request $request) {
        $requestData = $request->all();
        $comment = BlogComment::findOrFail($id);
        $comment->update($requestData);

        Session::flash('flash_message', 'تم تعديل الصفحة بنجاح');
        return redirect('admin/blog_comments');
    }

    public function destroy($id) {
        $comment = BlogComment::findOrFail($id);
        BlogComment::destroy($id);

        Session::flash('flash_message', 'Record deleted');
        return redirect('admin/blog_comments');
    }
}