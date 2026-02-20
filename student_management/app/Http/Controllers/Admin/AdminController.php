<?php


namespace App\Http\Controllers\Admin; // ✅ Capital A

use App\Http\Controllers\Controller; // ✅ THIS LINE WAS MISSING
use App\Models\Admin;
use Hash;
use App\Mail\Websitemail;
use App\Http\Services\EmailUpdateCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    //
   public function login(){
        return view('admin.login');
    }

   public function login_submit(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $admin= Admin::where('email',$request->email)->first();
        $check=$request->all();
        $data= [
            'email'=>$check['email'],
            'password'=>$check['password']
        ];
        if (Auth::guard('admin')->attempt($data)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        else{
            return redirect()->route('admin.login')->with('error','Invalid Credentials');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logged out successfully');
    }

    public function forget_password(){
        return view('admin.forget_password');
    }

      public function forget_password_submit(Request $request){
       $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $admin= Admin::where('email',$request->email)->first();
        if(!$admin){
            return redirect()->route('admin.forget.password')->with('error','Email not found');
        }
        $token=hash('sha256',time());
        $admin->token=$token;
        $admin->update();

        $link=route('admin_reset_password',['token'=>$token,'email'=>$request->email]);
        $subject="Reset Password";
        $message="Click the link to reset your password: <a href='".$link."'>Reset Password</a>";
        EmailUpdateCreate::createEmailRecord($request->email, $subject, $message);
        //Mail::to($request->email)->send(new WebsiteMail($subject,$message));
        return redirect()->back()->with('success','Reset password link has been sent to your email');
    }

    public function reset_password($token,$email){

       $admin=Admin::where('email',$email)->where('token',$token)->first();
       $data=array();
       $data['email']=$email;
       $data['token']=$token;
       if(!$admin){
            return redirect()->route('admin.login')->with('error','Invalid token or email');
        }

        return view('admin.admin_reset_password',$data);
    }

    public function reset_password_submit(Request $request,$token,$email){
        $request->validate([
            
            'password'=>'required|min:6|confirmed'
        ]);
        $admin=Admin::where('email',$email)->where('token',$token)->first();
        $admin->password=Hash::make($request->password);
        $admin->token=null;
        $admin->update();
        return redirect()->route('admin.login')->with('success','Password reset successfully');
    }

}
