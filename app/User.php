<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    const ADMIN_TYPE = 'admin';
    const USER_TYPE = 'user';
    function signup($username, $email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = md5($password);
        $this->user_type = self::USER_TYPE;
        $this->token=$this->RandomString(20);
        $this->setCreatedAt(Carbon::now()->format('Y-m-d H:i:s'));
        return true;
    }

    function sign_in($password){
          if($this->password==md5($password)){
              $username = $this->username;
              Session::put(['user'=>$username,'type'=>$this->user_type]);
              Session::save();
              if ($this->user_type===self::ADMIN_TYPE){
                  return redirect('/admin');
              }
              return redirect('/');
          }
          else
              return back()->withErrors('wrong password, try again!');
    }

    public function RandomString($length){
        $charachters = '0123456789abcdefghijklmnoqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLen = strlen($charachters);
        $randomString = '';
        for ($i=0 ; $i<$charLen ; $i++){
            $randomString.=$charachters[rand(0 , $charLen - 1)];
        }
        return $randomString;
    }

    public function isAdmin(){
        return $this->user_type === self::ADMIN_TYPE;
    }


}
