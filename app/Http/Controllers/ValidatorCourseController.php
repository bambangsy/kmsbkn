<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class ValidatorCourseController extends Controller
{
    public function index()
    {
        $paginationCount = 3;
        $courses_queue = Course::whereNull('is_currently_checked_by')->paginate($paginationCount, ['*'], 'queue_page');
        $courses_checked = Course::where('is_currently_checked_by', auth()->id())->where('status', 0)->paginate($paginationCount, ['*'], 'checked_page');
        $courses_approved = Course::where('status', 1)->paginate($paginationCount, ['*'], 'approved_page');
        $courses_rejected = Course::where('status', 2)->paginate($paginationCount, ['*'], 'rejected_page');
        
        $courses = Course::where('is_currently_checked_by', auth()->id())->get();
        
        return view("validator.courses.course", compact('courses_queue', 'courses_checked', 'courses_approved', 'courses_rejected'));
    }


    public function approve(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Course::findOrFail($id);
    
        // Update the status
        $knowledge->status = 1;
       
        $knowledge->validated_at = now();
        $knowledge->save();
    
        return redirect()->route('validasicourse');
    }

    public function retrieve(Request $request, $id)
    {
        $id = $request->id;
        
        $course = Course::findOrFail($id);
        if ($course->is_currently_checked_by == null) {
            $course->is_currently_checked_by = auth()->id();
            $course->save();
            return redirect()->route('validasicourse');
        }
        else{
            return redirect()->route('validasicourse')->with('warning', 'Pengetahuan ini sedang divalidasi oleh validator lain');
        }
        
    }

    public function reject(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Course::findOrFail($id);
    
        // Update the status
        $knowledge->status = 2;
        $knowledge->save();
    
        return redirect()->route('validasicourse');
    }
    public function cancel(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Course::findOrFail($id);
        $knowledge->is_currently_checked_by = null;
        $knowledge->status = 0;
        $knowledge->save();
    
        return redirect()->route('validasicourse');
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
