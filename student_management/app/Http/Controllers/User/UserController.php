<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\EmailUpdateCreate;
use App\Http\Requests\UserValidation\submit_registration;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    public function registration(){
        return view('user.registration');
    }

    public function registration_submit(submit_registration $request){
        // return $request->all();
        $data= [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        $token =hash('sha256',time());
        $user =new User();
        $user->token=$token;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=Hash::make($data['password']);
        $user->save();
       
        $link=route('registartion_verify',[$token,$request->email]);
        $subject='registartion verify';
        $message = "Click here to verify email: <br> <a href=\"" . $link . "\">Verify Now</a>";
        EmailUpdateCreate::createEmailRecord($request->email,$subject,$message);
        return redirect()->route('user.registration')->with('success','Registration successful. Please check your email to verify your account.');
    }

    public function registartion_verify($token,$email){
        $user= User::where('email',$email)->where('token',$token)->first();
        if(!$user){
            return redirect()->route('user.registration')->with('error','Invalid token or email');
        }
        $user->status=1;
        $user->token='';
        $user->update();
        return redirect()->route('user.login')->with('success','Email verified successfully. You can now log in.');
    }

    public function login(){
        return view('user.login');
    }




    // chnage it 

    public function login_submit(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user= User::where('email',$request->email)->first();
        $check=$request->all();
        $data= [
            'email'=>$check['email'],
            'password'=>$check['password']
        ];
        if (Auth::guard('web')->attempt($data)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        else{
            return redirect()->route('user.login')->with('error','Invalid Credentials');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login')->with('success','Logged out successfully');
    }

    public function forget_password(){
        return view('user.forget_password');
    }

      public function forget_password_submit(Request $request){
       $request->validate([
            'email'=>'required|email',
        ]);
        $user= User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->route('user.forget.password')->with('error','Email not found');
        }
        $token=hash('sha256',time());
        $user->token=$token;
        $user->update();
        $link = route('user.reset.password', ['token'=>$token, 'email'=>$request->email]);
        $subject="Reset Password";
        $message="Click the link to reset your password: <a href='".$link."'>Reset Password</a>";
        EmailUpdateCreate::createEmailRecord($request->email, $subject, $message);
        //Mail::to($request->email)->send(new WebsiteMail($subject,$message));
        return redirect()->back()->with('success','Reset password link has been sent to your email');
    }

    public function reset_password($token,$email){

       $admin=User::where('email',$email)->where('token',$token)->first();
       $data=array();
       $data['email']=$email;
       $data['token']=$token;
       if(!$admin){
            return redirect()->route('user.login')->with('error','Invalid token or email');
        }

        return view('user.reset_password',$data);
    }

    public function reset_password_submit(Request $request,$token,$email){
        $request->validate([
            'password'=>'required|min:6|confirmed'
        ]);
        $admin=User::where('email',$email)->where('token',$token)->first();
        $admin->password=Hash::make($request->password);
        $admin->token=null;
        $admin->update();
        return redirect()->route('user.login')->with('success','Password reset successfully');
    }
}
