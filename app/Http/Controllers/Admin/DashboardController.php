<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends InitController
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $counts['subscribers'] = \App\Subscriber::count();
        $counts['blog'] = \App\Blog::count();
        $counts['blog_comments'] = \App\BlogComment::count();
        $counts['messages'] = \App\Enquiry::count();
        $counts['compose'] = \App\EmailBulk::count();

        return view('admin.dashboard', compact('counts'));
    }
}
