<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Logo;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Main::first();
        // return $data;
        return view('pages.main',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'title'=> 'required|string',
    //         'sub_title'=>'required|string'
    //     ]);
    //     $main=Main::first();
    //     $main->title=$request->title;
    //     $main->sub_title=$request->sub_title;

    //     if($request->file('bg_image')){
    //         $img_file=$request->file('bg_image');
    //         $img_file->storeAs('public/img','bg_image.'.$img_file->getClientOriginalExtension());
    //         $main->bg_image='storage/public/img/bg_image.'.$img_file->getClientOriginalExtension();
    //     }
    //     if($request->file('resume')){
    //         $resume_file=$request->file('resume');
    //         $resume_file->storeAs('public/pdf','resume.'.$resume_file->getClientOriginalExtension());
    //         $main->resume='storage/public/pdf/resume.'.$resume_file->getClientOriginalExtension();
    //     }
    //     $main->save();
    //     return redirect()->route('admin.main')->with('success','Main page data updated successfully');
    //     // return $request->all();
    // }
    public function update(Request $request)
{
    $request->validate([
        'title'=> 'required|string',
        'sub_title'=>'required|string'
    ]);

    $main = Main::first();
    $main->title = $request->title;
    $main->sub_title = $request->sub_title;

    if ($request->file('bg_image')) {
    $img_file = $request->file('bg_image');
    $customName = 'main_background.' . $img_file->getClientOriginalExtension();
    $img_file->move(public_path('img'), $customName); // Direct to public/img
    $main->bg_image = 'img/' . $customName;
    }


    if ($request->file('resume')) {
        $resume_file = $request->file('resume');
        $resume_file->storeAs('public/pdf', 'resume.' . $resume_file->getClientOriginalExtension());
        $main->resume = 'storage/pdf/resume.' . $resume_file->getClientOriginalExtension();
    }

    $main->save();

    return redirect()->route('admin.main')->with('success', 'Main page data updated successfully');
}
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
