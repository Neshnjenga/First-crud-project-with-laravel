<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[Usercontroller::class,'register'])->name('register');
Route::post('/registerpost',[Usercontroller::class,'registerpost'])->name('registerpost');

Route::get('/login',[Usercontroller::class,'login'])->name('login');
Route::post('/loginpost',[Usercontroller::class,'loginpost'])->name('loginpost');

Route::get('/forgot',[ForgotPasswordController::class,'forgotPassword'])->name('forgot');
Route::post('/forgotpost',[ForgotPasswordController::class,'forgotpost'])->name('forgotpost');

Route::get('/reset/{token}',[ForgotPasswordController::class,'reset'])->name('reset');
Route::post('/resetpost/{token}',[ForgotPasswordController::class,'resetpost'])->name('resetpost');

Route::middleware('auth')->group(function(){
    Route::get('/create',[Usercontroller::class,'create'])->name('create');
    Route::post('/createpost',[Usercontroller::class,'createpost'])->name('createpost');
    Route::get('/edit/{id}',[Usercontroller::class,'edit'])->name('edit');
    Route::post('/editpost/{id}',[Usercontroller::class,'editpost'])->name('editpost');
    Route::get('/logout',[Usercontroller::class,'logout'])->name('logout');
    Route::get('/delete/{id}',[Usercontroller::class,'delete'])->name('delete');
    Route::get('/index',[Usercontroller::class,'index'])->name('index');
});
Route::get('/home',[Usercontroller::class,'home'])->name('home');


