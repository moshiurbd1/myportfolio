<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers=Team::all();
        return view('pages.teams.show',compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required|string',
            'designation'=>'required|string',
            'facebook'=>'required|url',
            'linkedin'=>'required|url',
            'x'=>'required|url'
        ]);
        $teamMember= new Team;
        $teamMember->name=$request->name;
        $teamMember->designation=$request->designation;
        $teamMember->facebook=$request->facebook;
        $teamMember->linkedin=$request->linkedin;
        $teamMember->x=$request->x;

        if($request->hasFile('image')){
            $image_file=$request->file('image');
            $image_name=time().'team'.uniqid().'.'.$image_file->getClientOriginalExtension();
            $image_file->move(public_path('img/team_images'),$image_name);
            $teamMember->image='img/team_images/'.$image_name;
        }
        
        if($teamMember->save()){
            return redirect()->route('admin.team.create')->with('success','Team member created successfully');
        }
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
        $teamMember=Team::findOrFail($id);
        return view('pages.teams.edit',compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'name'=>'required|string',
            'designation'=>'required|string',
            'facebook'=>'required|url',
            'linkedin'=>'required|url',
            'x'=>'required|url'
        ]);

        $teamMember=Team::findOrFail($id);

        $teamMember->name=$request->name;
        $teamMember->designation=$request->designation;
        $teamMember->facebook=$request->facebook;
        $teamMember->linkedin=$request->linkedin;
        $teamMember->x=$request->x;

        if($request->hasFile('image')){
            if($teamMember->image && file_exists(public_path($teamMember->image))){
                @unlink(public_path($teamMember->image));
            }

            $image_file=$request->file('image');
            $image_name=time().'team'.uniqid().'.'.$image_file->getClientOriginalExtension();
            $image_file->move(public_path('img/team_images'),$image_name);
            $teamMember->image='img/team_images/'.$image_name;

        }
        if($teamMember->save()){
            return redirect()->route('admin.team.show')->with('success','Team member updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $teamMember=Team::findOrFail($id);
       @unlink(public_path($teamMember->image));
       if($teamMember->delete()){
        return redirect()->route('admin.team.show')->with('success','Team member deleted successfully');
       }
    }
}
