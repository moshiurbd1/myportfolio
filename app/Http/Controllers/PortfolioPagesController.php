<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios=Portfolio::all();
        return view('pages.portfolios.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'sub_title'=>'required|string',
            'big_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'small_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description'=>'required|string',
            'client'=>'required|string',
            'category'=>'required|string'
        ]);

        $portfolio= new Portfolio;
        $portfolio->title=$request->title;
        $portfolio->sub_title=$request->sub_title;
        $portfolio->description=$request->description;
        
        $big_image_file=$request->file('big_image');
        $big_image_name = time().'_big_'.uniqid().'.'.$big_image_file->getClientOriginalExtension();
        $big_image_file->move(public_path('img/portfolio_images'),$big_image_name);

        $portfolio->big_image='img/portfolio_images/'.$big_image_name;

        $small_image_file=$request->file('small_image');
        $small_image_name = time().'_small_'.uniqid().'.'.$small_image_file->getClientOriginalExtension();
        $small_image_file->move(public_path('img/portfolio_images'),$small_image_name);
        
        $portfolio->small_image='img/portfolio_images/'.$small_image_name;

        $portfolio->client=$request->client;
        $portfolio->category=$request->category;

        if($portfolio->save()){
            return redirect()->route('admin.portfolio.create')->with('success','Portfolio created successfully');
        }else{
            return redirect()->route('admin.portfolio.create')->with('error','Portfolio failed create');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $portfolio=Portfolio::findOrFail($id);
        return view('pages.portfolios.edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $portfolio=Portfolio::findOrFail($id);
    //         $request->validate([
    //         'title'=>'required|string',
    //         'sub_title'=>'required|string',
    //         'big_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
    //         'small_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
    //         'description'=>'required|string',
    //         'client'=>'required|string',
    //         'category'=>'required|string'
    //     ]);

        
    //     $portfolio->title=$request->title;
    //     $portfolio->sub_title=$request->sub_title;
    //     $portfolio->description=$request->description;
        
    //     $big_image_file=$request->file('big_image');
    //     $big_image_name=time().'big'.uniqid().'.'.$big_image_file->getClientOriginalExtension();
    //     $big_image_file->move(public_path('img/portfolio_images'),$big_image_name);

    //     $portfolio->big_image='img/portfolio_images/'.$big_image_name;

    //     $small_image_file=$request->file('small_image');
    //     $small_image_name=time().'small'.uniqid().'.'.$small_image_file->getClientOriginalExtension();
    //     $small_image_file->move(public_path('img/portfolio_images'),$small_image_name);
        
    //     $portfolio->small_image='img/portfolio_images/'.$small_image_name;

    //     $portfolio->client=$request->client;
    //     $portfolio->category=$request->category;

    //     if($portfolio->save()){
    //         return redirect()->route('admin.portfolio.show')->with('success','Portfolio created successfully');
    //     }else{
    //         return redirect()->route('admin.portfolio.index')->with('error','Portfolio failed create');
    //     }
        
    // }
public function update(Request $request, string $id)
{
    $portfolio = Portfolio::findOrFail($id);

    $request->validate([
        'title' => 'required|string',
        'sub_title' => 'required|string',
        'big_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'small_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'description' => 'required|string',
        'client' => 'required|string',
        'category' => 'required|string',
    ]);

    // Update basic fields
    $portfolio->title = $request->title;
    $portfolio->sub_title = $request->sub_title;
    $portfolio->description = $request->description;
    $portfolio->client = $request->client;
    $portfolio->category = $request->category;

    // If new big image uploaded
    if ($request->hasFile('big_image')) {
        // Delete old image if exists
        if ($portfolio->big_image && file_exists(public_path($portfolio->big_image))) {
            unlink(public_path($portfolio->big_image));
        }

        // Upload new image
        $big_image_file = $request->file('big_image');
        $big_image_name = time().'_big_'.uniqid().'.'.$big_image_file->getClientOriginalExtension();
        $big_image_file->move(public_path('img/portfolio_images'), $big_image_name);

        $portfolio->big_image = 'img/portfolio_images/' . $big_image_name;
    }

    // If new small image uploaded
    if ($request->hasFile('small_image')) {
        // Delete old image if exists
        if ($portfolio->small_image && file_exists(public_path($portfolio->small_image))) {
            unlink(public_path($portfolio->small_image));
        }

        // Upload new image
        $small_image_file = $request->file('small_image');
        $small_image_name = time().'_small_'.uniqid().'.'.$small_image_file->getClientOriginalExtension();
        $small_image_file->move(public_path('img/portfolio_images'), $small_image_name);

        $portfolio->small_image = 'img/portfolio_images/' . $small_image_name;
    }

    if ($portfolio->save()) {
        return redirect()->route('admin.portfolio.show', $portfolio->id)
            ->with('success', 'Portfolio updated successfully');
    } else {
        return redirect()->route('admin.portfolio.index')
            ->with('error', 'Portfolio update failed');
    }
}


//     public function update(Request $request, string $id)
// {
//     $portfolio = Portfolio::findOrFail($id);

//     $request->validate([
//         'title' => 'required|string',
//         'sub_title' => 'required|string',
//         'big_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
//         'small_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
//         'description' => 'required|string',
//         'client' => 'required|string',
//         'category' => 'required|string',
//     ]);

//     $portfolio->title = $request->title;
//     $portfolio->sub_title = $request->sub_title;
//     $portfolio->description = $request->description;
//     $portfolio->client = $request->client;
//     $portfolio->category = $request->category;

//     // Handle big image
//     if ($request->hasFile('big_image')) {
//         if (file_exists(public_path($portfolio->big_image))) {
//             unlink(public_path($portfolio->big_image));
//         }

//         $big_image_file = $request->file('big_image');
//         $big_image_name = time().'_big_'.uniqid().'.'.$big_image_file->getClientOriginalExtension();
//         $big_image_file->move(public_path('img/portfolio_images'), $big_image_name);
//         $portfolio->big_image = 'img/portfolio_images/'.$big_image_name;
//     }

//     // Handle small image
//     if ($request->hasFile('small_image')) {
//         if (file_exists(public_path($portfolio->small_image))) {
//             unlink(public_path($portfolio->small_image));
//         }

//         $small_image_file = $request->file('small_image');
//         $small_image_name = time().'_small_'.uniqid().'.'.$small_image_file->getClientOriginalExtension();
//         $small_image_file->move(public_path('img/portfolio_images'), $small_image_name);
//         $portfolio->small_image = 'img/portfolio_images/'.$small_image_name;
//     }

//     if ($portfolio->save()) {
//         return redirect()->route('admin.portfolio.show', $portfolio->id)
//             ->with('success', 'Portfolio updated successfully');
//     } else {
//         return redirect()->route('admin.portfolio.index')
//             ->with('error', 'Portfolio update failed');
//     }
// }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Portfolio::findOrFail($id);
        @unlink(public_path($data->big_image));
        @unlink(public_path($data->small_image));
        $data->delete();
        return redirect()->route('admin.portfolio.show')->with('success','Portfolio deleted successfully');

    }
}
