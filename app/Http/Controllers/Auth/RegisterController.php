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
        $data=$request->only('name','email');
        $data['password']=Hash::make($request->password);
        if(User::create($data)){
            return 'user created successfully';
        }else{
            return 'User faild to create';
        }
        
    }
}
