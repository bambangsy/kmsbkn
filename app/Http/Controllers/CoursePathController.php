<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Course;
use App\Models\PathCourse;
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
            'status' => 3,
            'created_by_id' => auth()->user()->id,
        ]);
        return redirect(route('course'));
    }

    public function store_items(Request $request, string $id)
    {
        $pathId = $id;
        $path = Path::findOrFail($pathId);


        $items = json_decode($request->items);

        foreach ($items as $courseId) {
            PathCourse::create([
                'path_id' => $pathId,
                'course_id' => $courseId,
            ]);
        }

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
        $path = Path::findOrFail($id);
        $courses = Course::where('created_by_id', auth()->user()->id)->get();
        $path_courses = PathCourse::where('path_id', $id)->get();
        $path_courses = $path_courses->pluck('course_id')->toArray();
        $courses_list = Course::whereIn('id', $path_courses)->get();
        
        return view('expert.course.show_path', compact('path', 'courses', 'courses_list'));
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
        $path_courses = PathCourse::where('path_id', $id)->get();
        foreach ($path_courses as $path_course) {
            $path_course->delete();
        }
        $path->delete();
        return redirect(route('course'));
    }
}
