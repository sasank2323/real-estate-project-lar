<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailData extends Model
{
    //
    protected $table = 'email_data';
    public $timestamps = false;
    protected $fillable = ['email', 'subject', 'message', 'created_at'];
}
