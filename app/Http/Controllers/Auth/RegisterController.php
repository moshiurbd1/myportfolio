<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('loginRegister.register');
    }

    public function register_confirm(Request $request){

        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6'
        
    ]);
        $data=$request->only('name','email');
        $data['password']=Hash::make($request->password);
        if(User::create($data)){
            return 'user created successfully';
        }else{
            return 'User faild to create';
        }
        
    }
}
