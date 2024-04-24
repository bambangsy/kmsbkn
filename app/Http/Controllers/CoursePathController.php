<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;

class CoursePathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expert.course.path');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        Path::create([
            'name' => $name,
            'description' => $description,
            'status' => 3
        ]);
        return redirect(route('course'));
    }

    public function validate(Request $request, $id)
    {   
        
        $id = $request->id;
        $knowledge = Path::findOrFail($id);
    
        // Update the status
        $knowledge->status = 0;
        $knowledge->save();
    
        return redirect()->route('course');
    }
    public function cancel_validate(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Path::findOrFail($id);
    
        // Update the status
        $knowledge->status = 3;
        $knowledge->save();
    
        return redirect()->route('course');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $path = Path::find($id);
        $path->delete();
        return redirect(route('course'));
    }



}
