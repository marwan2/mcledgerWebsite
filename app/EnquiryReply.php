<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnquiryReply extends Model
{
    protected $table = 'enquiry_reply';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function message()
    {
    	return $this->belongsTo(Enquiry::class);
    }
}
