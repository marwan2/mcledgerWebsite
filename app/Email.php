<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails';
    protected $primaryKey = 'id';
    protected $fillable = ['email_template_id', 'user_id', 'admin_id', 'subject', 'body', 'goto_inbox', 'goto_email'];

    public static $email_noreply = 'noreply@mcledger.co';
    
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function message() {
    	return $this->belongsTo('App\Enquiry');
    }
}
