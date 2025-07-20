<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;

class PageController extends Controller
{

        public function dashboard(){
        return view('pages.dashboard');
    }
    
    public function main(){
        return view('pages.main');
    }

    public function index(){
        $portfolios=Portfolio::all();
        $services=Service::all();
        $main=Main::first();
        return view('pages.index',compact('main','services','portfolios'));
    }

    




}
