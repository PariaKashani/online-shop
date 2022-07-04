<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showAdminPage(Request $request){
        //check if admin
        if (Session::has('user')){
            $temp = User::where('username',session('user'))->first();
            if ($temp->user_type === User::ADMIN_TYPE){
                return view('/admin/dashboard');
            }
        }
        else{
            return back()->withErrors('you dont have permission for this page!');
        }


    }
    //
}
