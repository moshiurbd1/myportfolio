<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\About;
use App\Models\Team;

class PageController extends Controller
{

        public function dashboard(){
        return view('pages.dashboard');
    }
    
    public function main(){
        return view('pages.main');
    }

    public function index(){
        $teamMembers=Team::all();
        $abouts=About::all();
        $portfolios=Portfolio::all();
        $services=Service::all();
        $logo=Logo::first();
        $main=Main::first();
        return view('pages.index',compact('main','services','portfolios','abouts','teamMembers','logo'));
    }

    




}
