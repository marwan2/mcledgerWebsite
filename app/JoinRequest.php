<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Settings;

class JoinRequest extends Model
{
    protected $guarded = [];

    public static $joinAs = [
        'accountant'=>'primary',
        'client'=>'success',
        'checker'=>'warning',
        '3rdparty'=>'danger',
    ];

    public static function notify($contact_message, $reply_message=null)
    {
        $settings = Settings::section('mail');
        $to['email'] = Settings::fetch('email_to', $settings);
        $to['from'] = Settings::fetch('email_from', $settings);
        $to['name'] = Settings::fetch('email_name', $settings);

        $view = 'front.emails.contact.message';
        $subject = 'New Message';

        Mail::send($view, ['contact_message' => $contact_message, 'user'=>$to], function ($m) use ($to, $contact_message) {
            $m->from($to['from'], 'Website');
            $m->to($to['email'], $to['name'])->subject('رسالة جديدة من الموقع');
        });
    }
}
