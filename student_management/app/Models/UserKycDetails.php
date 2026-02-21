<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserKycDetails extends Model
{
    //
    protected $table = 'user_kyc_details';
    protected $fillable = [
        'user_id',
        'pan_number',
        'aadhar_number',
        'passport_number',
        'driving_license_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
