<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\errortesting;
use App\Http\Controllers\sasank;


Route::get('/', function () {
    return view('welcome');
});





Route::get('/login',[FrontController::class,'index'])->name('login');

Route::get('/about',[FrontController::class,'about'])->name('about');

// user controllers 

Route::middleware('user')->prefix('user')->group(function () {
   Route::get('/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
});

Route::prefix('user')->group(function () {
   Route::get('/registration',[UserController::class,'registration'])->name('user.registration');
   Route::post('/registration_submit',[UserController::class,'registration_submit'])->name('user.registration.submit');
   Route::get('/registartion-verify/{token}/{email}',[UserController::class,'registartion_verify'])->name('registartion_verify');
   Route::get('/userlogin',[UserController::class,'login'])->name('user.login');
   Route::post('/userloginsubmit',[UserController::class,'login_submit'])->name('user.login.submit');
   Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
   Route::get('/forget-password',[UserController::class,'forget_password'])->name('user.forget.password');
   Route::post('/forget_password_submit',[UserController::class,'forget_password_submit'])->name('user.forget.password.submit');
    Route::get('/reset-password/{token}/{email}',[UserController::class,'reset_password'])->name('user.reset.password');
    Route::post('/reset-password-submit/{token}/{email}',[UserController::class,'reset_password_submit'])->name('user.reset.password.submit');
});


//Admin panel 

Route::middleware('admin')->prefix('admin')->group(function () {
   Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    
   Route::get('/',function(){
       return redirect()->route('admin.login');
   });

   Route::get('/login',[AdminController::class,'login'])->name('admin.login');
   Route::post('/login',[AdminController::class,'login_submit'])->name('admin.login.submit');
   Route::get('/forget-password',[AdminController::class,'forget_password'])->name('admin.forget.password');
   Route::post('/forget-password',[AdminController::class,'forget_password_submit'])->name('admin.forget.password.submit');
   Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
   Route::get('/reset-password/{token}/{email}',[AdminController::class,'reset_password'])->name('admin_reset_password');
   Route::post('/reset-password/{token}/{email}',[AdminController::class,'reset_password_submit'])->name('admin.reset.password.submit');
});



Route::get('/error/{id}', [errortesting::class, 'show'])->name('error.testing');


 Route::get('/sasank',[sasank::class,'index']);
 Route::get('/sasank/create',[sasank::class,'create']);