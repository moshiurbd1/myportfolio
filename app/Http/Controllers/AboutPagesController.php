<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title1'=>'required|string',
            'title2'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description'=>'required|string'
        ]);
        $about= new About;
        $about->title1=$request->title1;
        $about->title2=$request->title2;
        $about->description=$request->description;


        if($request->file('image')){
            $image_file=$request->file('image');
            $image_name=time().'about'.uniqid().'.'.$image_file->getClientOriginalExtension();
            $image_file->move(public_path('img/about_images'),$image_name);
            $about->image='img/about_images/'.$image_name;
        }
        if($about->save()){
            return redirect()->route('admin.about.create')->with('success','New about created successfullly');
        }else{
            return redirect()->route('admin.about.create')->with('error','New about faild to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 234;
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
