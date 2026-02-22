<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Scopes\published;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailData extends Model
{
    //
     use HasFactory;
    protected $table = 'email_data';
    public $timestamps = false;
    protected $fillable = ['email', 'subject', 'message', 'created_at'];

    public function subject():Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value)
        );
    }
    //global scope example calling in controller {post::withoutGlobalScope(published::class)->get()} to get all data without scope other wise it will return only published data or apply this filter automatically to all queries
    // protected static function booted()
    // {
    //     // static::creating(function ($emailData) {
    //     //     $emailData->created_at = now();
    //     // });
    //     static::addGlobalScope(new published);
    // }

    //local scope example calling in controller { post::published()->get()} to get only published data
    // public function scopePublished($query)
    // {
    //     return $query->where('created_at', '<=', now());
    // }

    //same but in old style 
    // public function getSubjectAttribute($value)
    // {
    //         return ucfirst($value);
    //     }

    //     public function setSubjectAttribute($value)
    //     {
    //         $this->attributes['subject'] = strtolower($value);
    //     }
}
















































// THIS IS A DEMO OF ELOQUENT ACCESSORS == get  IN LARAVEL and mutator ==set before inserting 


// ⭐ The IMPORTANT part — subject() Attribute
// public function subject(): Attribute
// {
//     return Attribute::make(
//         get: fn ($value) => strtoupper($value),
//     );
// }
// 🔹 What is this?

// This is an Eloquent Accessor using Laravel’s Attribute class.

// 📌 Accessor = modifies data when you READ it

// 🧠 What exactly does it do?

// Whenever you access:

// $email = EmailData::find(1);
// echo $email->subject;

// Laravel will automatically:

// strtoupper($subject);
// Example
// Database value:
// welcome email
// Output in PHP:
// WELCOME EMAIL

// 🔥 The database value stays unchanged.

//sasank 
