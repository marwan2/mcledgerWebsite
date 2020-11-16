<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class HomeController extends Controller
{
    public function index() {
        //$blog = Blog::whereActive(1)->with('category', 'author')->withCount('comments')->orderBy('id', 'DESC')->take(6)->get();
        return view('front.index');
    }

    public function about() {
        return view('front.about');
    }
    
    public function howItWorks() {
        return view('front.howItWorks');
    }

    public function invoicing() {
        return view('front.invoicing');
    }

    public function pricing() {
        return view('front.pricing');
    }
    
    public function contact() {
        return view('front.contact-us');
    }
    
    public function faq() {
        return view('front.faq');
    }
    
    public function privacyPolicy() {
        return view('front.privacy-policy');
    }

    public function termsConditions() {
        return view('front.terms-conditions');
    }
    
    public function signUp() {
        return view('front.platform.signUp');
    }

    public function joinAsAccountant() {
        return view('front.platform.joinAsAccountant');
    }
    
    public function joinAsClient() {
        return view('front.platform.joinAsClient');
    }
    
    public function app() {
        return view('front.apps.download');
    }

}
