<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone' => 'required|digits_between:7,15',
            'message' => 'required|string',
        ]);
        $mail=$request->all();

        Mail::to('moshiur11222001@gmail.com')->send( new ContactFormMail($mail));
        
        

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
