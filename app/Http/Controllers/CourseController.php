<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $userId = auth()->user()->id;
    
        $courses = Course::where('created_by_id', $userId)->get();
        
        $paths = Path::where('created_by_id', $userId)->get();
        return view('expert.course.course', compact('paths','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expert.course.create_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $name = $request->name;
        $description = $request->description;
        if ($request->link) {
            $source_id = 2;
            $file = $request->link;
        } else if ($request->video) {
            $source_id = 1;
            $file = $request->file('video')->store('course-videos');
        }

        $filePath = 'storage/'.$file;
        $userId = auth()->user()->id;
        Course::create([
            'name' => $name,
            'description' => $description,
            'file' => $file,
            'status' => 0,
            'created_by_id' => $userId,
            'source_id' => $source_id
        ]);
        return redirect(route('course'));
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
        //
    }
}
