<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Settings;

class JobApplication extends Model
{
    protected $guarded = [];
    public static $to_mail = 'info@mcledger.co';
}
