<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Settings;

class Enquiry extends Model
{
    protected $guarded = [];

    public function replies() {
        return $this->hasMany(EnquiryReply::class);
    }

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
            $m->to($to['email'], $to['name'])->subject('A message from the website');
        });
    }
}
