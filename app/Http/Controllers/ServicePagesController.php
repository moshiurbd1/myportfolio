<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicePagesController extends Controller
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
        return view('pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string'
        ]);
        if(Service::create($request->all())){
            return redirect()->route('admin.service.create')->with('success','Service created successfully');
        }else{
        return redirect()->route('admin.service.create')->with('error','Service field to create');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $services=Service::all();
        return view('pages.services.show',compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $service=Service::findOrFail($id);
        return view('pages.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service=Service::findOrFail($id);
        
        $request->validate([
            'icon'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string'
        ]);
            $service->icon=$request->icon;
            $service->title=$request->title;
            $service->description=$request->description;
            $service->save();

        return redirect()->route('admin.service.show')->with('success','Service updated successfunlly!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $service=Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.service.show')->with('success','Service deleted successfully');
    }
}
