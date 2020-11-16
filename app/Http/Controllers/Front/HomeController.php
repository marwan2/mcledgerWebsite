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
        //Detect special conditions devices
        $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
        $webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

        //do something with this information
        if( $iPod || $iPhone ){
           return redirect()->to("https://apps.apple.com/us/app/mcledger/id1499626950?ls=1");
            //browser reported as an iPhone/iPod touch -- do something here
        } else if($iPad){
           return redirect()->to("https://apps.apple.com/us/app/mcledger/id1499626950?ls=1");
            //browser reported as an iPad -- do something here
        } else if($Android){
            return redirect()->to("https://play.google.com/store/apps/details?id=com.mcledger.app");
            //browser reported as an Android device -- do something here
        } else if($webOS){
           return redirect()->to("https://portal.mcledger.co/register");
            //browser reported as a webOS device -- do something here
        } else {
           return redirect()->to("https://portal.mcledger.co/register");
        }

        return 'Sorry cannot detect your browser';
    }

}
