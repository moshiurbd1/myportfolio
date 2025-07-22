<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
{
    public function logo(){
        return view('pages.logo.logo');
    }


public function logoUpdate(Request $request)
{
    $request->validate([
        'logo'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $logo = Logo::first();
  

    if ($request->hasFile('logo')) {
        if($logo->logo && file_exists(public_path($logo->logo))){
            unlink(public_path($logo->logo));
        }
    $img_file = $request->file('logo');
    $customName = 'logo.' . $img_file->getClientOriginalExtension();
    $img_file->move(public_path('img/logo'), $customName); 
    $logo->logo = 'img/logo/' . $customName;
    }


    if($logo->save()){
        return redirect()->route('admin.logo')->with('success', 'Logo updated successfully');
    }

    
}
}
