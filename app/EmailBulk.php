<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailBulk extends Model
{
    protected $table = 'emails_bulk';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
