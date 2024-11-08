<?php

namespace App\Http\Controllers;

use App\Models\Todomodel;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function register(){
        return view("register");
    }

    public function registerpost(Request $request){
        $request ->validate([
            'name'=>'required|unique:users',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8|max:50|confirmed'
        ]);
        $users = new User();
        $users ->name = $request ->name;
        $users ->email = $request ->email;
        $users ->password = Hash::make($request ->password);
        $users ->save();
        return redirect(route('login'))->with('success','Account Created');
    }

    public function login(){
        return view("login");
    }

    public function loginpost(Request $request){
        $request ->validate([
            "email"=> "required",
            'password'=>'required'
        ]);
        $users = User::where('email', $request ->email)->first();
        if($users){
            if(Hash::check($request->password, $users ->password)){
                auth()->login($users);
                return redirect(route('home'));
            }
            else{
                return redirect(route('login'))->with('error','Incorrect password');
            }
        }
        else{
            return redirect(route('login'))->with('error','No such user');
        }
    }

    public function home(){
        return view("home");
    }

    public function index(){
        $users = Todomodel::where('user_id',auth()->user()->id)->get();
        return view("index",['users'=> $users]);
    }

    public function create(){
        return view("create");
    }

    public function createpost(Request $request){
        $request ->validate([
            'name'=>'required',
            'date'=>'required',
        ]);
        $users = new Todomodel();
        $users -> user_id = auth()->user()->id;
        $users -> name = $request -> name;
        $users -> date = $request -> date;
        $users -> save();
        return redirect(route('index'))->with('success','New todo created');
    }

    public function edit($id){
        $users = Todomodel::find($id);
        return view('edit',['users'=> $users]);
    }
    public function editpost(Request $request, $id){
        $validatedata = $request->validate([
            'name'=>'required',
            'date'=> 'required',
        ]);
        $users = Todomodel::find($id);
        if($users){
            $users -> update($validatedata);
            return redirect(route(name: 'index'))->with('success','Todo updated');
        }
        else{
            return redirect(route('index'))->with('error','No such id');
        }
        
    }

    public function delete($id){
        $users = Todomodel::find($id);
        if($users){
            $users -> delete();
            return redirect(route('index'))->with('success','Todo deleted');
        }
        else{
            return redirect(route('index'))->with('error','No such id');
        }
    }

    public function logout(){
        auth() ->logout();
        return redirect(route('home'));
    }
}
