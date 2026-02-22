<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserKycDetails;

class errortesting extends Controller
{
    //
    public function show($id){
        $user = User::find($id);
        $user_proof=$user->user_kyc_details;
        $post=UserKycDetails::find(1);
        $post_user_data=$post->user;
        $user_sitevisit=$user->sitevisit;
        //dd($user);
        dd($user_sitevisit);
        if (!$user) {
        abort(404);
        }
        else{
            return view('welcome');
        }
    }


}
