<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class auth extends Controller
{
    function sign_in(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $user = User::where('username',$username)->first();
        if (!(isset($user))) return back()->withErrors('user not found, try again!');
        return $user->sign_in($password);
    }

    function sign_up(Request $request){
        $user = new User();
        //return $request;
        if($request->filled(['username','email','password','confirm_password'])){
            $username=$request->input('username');
            $email=$request->input('email');
            $password= $request->input('password');
            $user->signup($username,$email,$password);
            $user->save();
        }
        return redirect('/')->with(['message'=>'user registered successfully!']);;
    }

    public function sign_out(Request $request){
        Session::forget(['user','type']);
        Session::save();
        return redirect('/')->with(['message'=>'logged out successfully!']);
    }

    function showSignupForm(){
        return view('signupForm');
    }
    function showSigninForm(){
        return view('loginForm');
    }
}