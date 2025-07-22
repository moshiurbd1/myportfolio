<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('loginRegister.login');
    }

    public function confirm_confirm(Request $request){
        $user=$request->only('email','password');

        if(Auth::attempt($user)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login');
        }
        
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
