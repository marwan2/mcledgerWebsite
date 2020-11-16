<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cache;
use View;
use Session;
use App;

class InitController extends Controller
{
    public $settings;

    public function __construct()
    {

    }
}