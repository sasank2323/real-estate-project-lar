<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class errortesting extends Controller
{
    //
    public function show($id){
        $user = User::find($id);
        if (!$user) {
        abort(404);
        }
        else{
            return view('welcome');
        }
    }
}
