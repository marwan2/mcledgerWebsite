<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cache;
use View;
use Session;
use App;
use App\Settings;

class InitController extends Controller
{
    public $settings;

    public function __construct()
    {
    	$this->settings = Cache::remember('settings', 360, function() {
            return [
                'site'=>Settings::section('site'),
                'contact'=>Settings::section('contact'),
                'meta'=>Settings::section('meta'),
                'mail'=>Settings::section('mail'),
            ];
        });

    	view()->share('trial_url', url('qr'));
    	view()->share('settings', $this->settings);
    }
}