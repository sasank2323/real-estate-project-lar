<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sitevisit extends Model
{
    //
    protected $table = 'sitevisit';
    protected $fillable = [
        'user_id',
        'prop_name',
        'prop_id',
        'site_city',
        'site_zipcode',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
