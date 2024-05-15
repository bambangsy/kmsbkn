<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knowledge;
use App\Models\Path;
use App\Models\Course;
use App\Models\Progress;


class LearningHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $userId = auth()->user()->id;
        $progress = Progress::where('user_id', $userId)->get();
        
        $paths = [];
        $courses = [];
        foreach ($progress as $p) {
            if ($p->type == 'path') {
                $paths[] = Path::find($p->task_id);
            } elseif ($p->type == 'course') {
                $courses[] = Course::find($p->task_id);
            }
        }
        $pathCourses = $paths;
        return view('user.learningHistory', compact('courses', 'pathCourses'));
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
