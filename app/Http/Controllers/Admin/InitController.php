<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
//use App\Language;
//use App\Country;

use View;
use App;
use Session;
use Cache;

class InitController extends Controller
{
	public $current_lang_id;
    public $lang_for_slug;

    public function __construct()
    {
    	//Language
        /*if(Session::has(Language::$lang_session)) {
            App::setLocale(Session::get(Language::$lang_session));
        } else {
            App::setLocale('ar');
        }
        $languages = Language::$langs;
        $current_language = $languages[App::getLocale()];
        $this->current_lang_id = $current_language['id'];
        \Carbon\Carbon::setLocale(App::getLocale());


        $countries = new Country;
        $countries = $countries->whereActive(1);
        if(App::getLocale()=='en') {
            $countries = $countries->orderBy('name_english', 'ASC')->select('id','name_english AS name')->lists('name', 'id');
        } else {
            $countries = $countries->orderBy('country_name', 'ASC')->select('id','country_name AS name')->lists('name', 'id');
        }

        $this->lang_for_slug = 1;

		View::share('languages', $languages);
        View::share('current_language', $current_language);
        View::share('countries', $countries);*/
        $users = Cache::remember('users_count', 10, function() { return User::all(); });
    }
}
