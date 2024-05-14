<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Course;
use App\Models\PathCourse;
use App\Models\User;
use App\Models\Progress;


use Illuminate\Http\Request;

use function Laravel\Prompts\progress;

class UserCoursePathController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $sorted_by = $request->input('sorted_by');
        
        $page = $request->input('page', 1);
        
        $perPage = 3;
        $pathCourses = Path::all()
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        });



        return view("user.alur-belajar", ['pathCourses' => $pathCourses, 'sorted_by' => $sorted_by]);
    }

    public function show($id)
    {   
        $user = auth()->id();
        $path = Path::find($id);
        $courses = PathCourse::where('path_id', $id)->get();
        $courses = $courses->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $courses)->get();
        
        $createdById = $path->created_by_id;
        $createdBy = User::find($createdById);
        $progress = Progress::where('user_id', $user)->first(); // Fix the query to get the user's progress

        $isEnrolled = $progress ? 1 : 0; // Check if the user is enrolled

        return view('user.courses.take_courses', compact('path', 'courses', 'createdBy', 'progress', 'isEnrolled')); // Pass the isEnrolled variable to the view
    }

    public function enroll($id)
    {
        $user = auth()->user();
        $progress = Progress::where('task_id', $id)->where('type', 'path')->where('user_id', $user->id)->first();
        
        if ($progress) {
            $isEnrolled = 0;
            return redirect()->route('user.courses.take_courses',$id);
        }
        $progress = new Progress();
        $progress->task_id = $id;
        $progress->type = 'path';
        $progress->user_id = $user->id;
        $progress->save();
        return redirect()->route('user.alur-belajar.show',$id);
}
}
