<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\ForgotPassword;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class ForgotPasswordController extends Controller
{
   public function forgotPassword(){
    return view('auth.forgot');
   }

   public function forgotpost(Request $request){
    $request->validate([
        'email'=>'required'
    ]);
    $token = Str::random(100);
    $createdAt = Carbon::now();
    $email = $request->email;
    $userExist = User::where('email',$request->email)->first();
    if($userExist){
        $user_id =$userExist->id;
        $tokenExist = ForgotPassword::where('user_id',$user_id)->first();
        if($tokenExist){
            $tokenExist->token=$token;
            $tokenExist->createdAt=$createdAt;
            $tokenExist->save();
        }
        else{
            $userToken = new ForgotPassword();
            $userToken -> user_id = $user_id;
            $userToken -> token = $token;
            $userToken -> createdAt = $createdAt;
            $userToken -> save();
        }
        Mail::to($email)->send(new ForgotPasswordMail($token));
        return back()->with('success','We have sent you a reset link to ' .  $request->email);
    }
    else{
        return back()->with('error','No such email');
    }
   }

   public function reset($token){

    return view('auth.reset',compact('token'));
   }

   public function resetpost(Request $request ,$token){
    $request -> validate([
        'password'=>'required|min:8|max:50|confirmed'
    ]);
    $tokenPresent = ForgotPassword::where('token',$token)->first();
    if($tokenPresent && Carbon::now()->subMinutes(1)>$tokenPresent->createdAt){
        return redirect(route('forgot'))->with('error','Token has expired');
    }
    else{
        $user_id = $tokenPresent->user_id;
        $user = User::where('id',$user_id)->first();
        $user->password= Hash::make($request->password);
        $user->save();
        return redirect(route('login'))->with('success','Password changed successfully');
    }
   }

}
