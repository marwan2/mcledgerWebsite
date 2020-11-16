<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;

use App\Blog;
use App\BlogCategory;
use App\BlogComment;
use App\BlogAuthor;

class BlogController extends InitController
{
	public function __construct() {
    	parent::__construct();

        $blog_cats = BlogCategory::whereActive(1)->withCount('articles')->get();
        $blog_tags = Blog::whereActive(1)->where('tags','<>','')->take(10)->select('id','tags')->get();
        $featured_posts = Blog::whereActive(1)->whereFeatured(1)->take(4)->orderBy('id','DESC')->get();

        view()->share('blog_cats', $blog_cats);
        view()->share('blog_tags', $blog_tags);
        view()->share('featured_posts', $featured_posts);
    }

	public function index()
    {
        $page_size = 6;

        $blog = new Blog;
        $blog = $blog->whereActive(1);
        $blog = $blog->orderBy('id','DESC');
        $blog = $blog->with('category','author');
        $blog = $blog->withCount('comments');
        $blog = $blog->paginate($page_size);

        return view('front.blog.index', compact('blog'));
    }

    public function search(Request $req)
    {
        $page_size = 6;
        $q = $req->get('q');
        $q = trim($q);

        $results = new \App\Blog;

        $results = $results->where('active',1)
        ->where(function($query) use ($q) {
            $query->where('title', 'LIKE', '%'.$q.'%')
            ->orWhere('details', 'LIKE', '%'.$q.'%');
        });

        $results = $results->with('category','author');
        $results = $results->withCount('comments');
        $blog = $results->orderBy('updated_at', 'DESC')->take(30)->paginate($page_size);
        
    	return view('front.blog.search_results', compact('blog'));
    }

    public function category($slug)
    {
        $page_size = 8;
        $category = BlogCategory::whereSlug($slug)->first();

        if(!$category) {
            Session::flash('flash_message', 'Category not found');
            return redirect()->to('blog');
        }

        $blog = new Blog;
        $blog = $blog->whereActive(1)->whereCategory_id($category->id)->orderBy('id','DESC');
        $blog = $blog->with('category','author');
        $blog = $blog->paginate($page_size);

        return view('front.blog.category', compact('blog', 'category'));
    }

    public function author($slug)
    {
        $page_size = 8;
        $author = BlogAuthor::whereSlug($slug)->first();

        if(!$author) {
            Session::flash('flash_message', 'Auhtor not found');
            return redirect()->to('blog');
        }

        $blog = new Blog;
        $blog = $blog->whereActive(1)->whereAuthor_id($author->id)->orderBy('id','DESC');
        $blog = $blog->with('category','author');
        $blog = $blog->paginate($page_size);

        return view('front.blog.author_posts', compact('blog', 'author'));
    }

    public function tag($tag)
    {
    	$blog = Blog::whereActive(1)->where('tags','LIKE','%'.$tag.'%')->orderBy('id','DESC')->paginate(10);
    	return view('front.blog.tag', compact('blog', 'tag'));
    }

    public function show($slug) {
    	if(!$slug) {
            Session::flash('flash_message', 'Blog post not found');
    		return redirect('blog');
    	}

        $item = Blog::whereActive(1)->whereSlug($slug)->with('comments','category','author')->first();
        if(!$item) {
            Session::flash('flash_message', 'Blog post not found');
        	return redirect('blog');
        }
        $item->views = $item->views + 1;
        $item->save();

        $read_also = Blog::where('id','<>',$item->id)->whereActive(1)->orderBy('id','DESC')->take(4)->get();

        return view('front.blog.show', compact('item', 'read_also'));
    }

    public function postComments(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'comment'=>'required'
        ]);

        $article = Blog::find($request->get('record_id'));

        if(!$article) {
            return redirect()->to('blog');
        }

        $comment = new BlogComment;
        $status = 0;
        if($comment->create($request->all())) {
            $status = 1;
        } else {
            $status = 0;
        }
        
        return redirect()->to('blog/comment-status/'.$article->slug.'?status='.$status);        
    }

    public function commentStatus(Request $req, $slug)
    {
        return view('front.blog.status', compact('slug'));
    }
}