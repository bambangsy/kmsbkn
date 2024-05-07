<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Progress;


use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $sorted_by = $request->input('sorted_by');
        $page = $request->input('page', 1);
        $perPage = 3;
        $courses = Course::where('status', 1)
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'LIKE', "%{$search}%");
            })
            ->when($sorted_by === 'newest', function ($query) {
                return $query->orderBy('validated_at', 'desc');
            })
            ->when($sorted_by === 'popularity', function ($query) {
                return $query->orderBy('view_count', 'desc');
            })
            ->orderBy('validated_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);


        // $courses = Course::where('status', 1)
        //     ->when($search, function ($query) use ($search) {
        //         return $query->where('name', 'LIKE', "%{$search}%");
        //     })
        //     ->when($sorted_by === 'newest', function ($query) {
        //         return $query->orderBy('validated_at', 'desc');
        //     })
        //     ->when($sorted_by === 'popularity', function ($query) {
        //         return $query->orderBy('view_count', 'desc');
        //     })
        //     ->orderBy('validated_at', 'desc')
        //     ->paginate($perPage, ['*'], 'page', $page);
        
            return view("user.pelatihan", ['courses' => $courses, 'sorted_by' => $sorted_by,]);
    }

    public function show($id)
    {   
         
        $user = auth()->id();
        $course = Course::find($id);
        $progress = Progress::where('task_id', $course->id)->where('type', 'course')->where('user_id', $user)->first();
        if ($progress) {
            return view("user.courses.take_lesson", compact('course','progress'));
        } else {
            return view("user.enrollpelatihan", compact('course'));
        }
      }


    public function enroll(Request $request,$id)
    {   
        $id = $request->id;
        $user = auth()->id();
        $course = Course::find($id);
        $progress = Progress::where('task_id', $course)->where('user_id', $user)->first();
        if (!$progress) {
            
            $progress = new Progress();
            $progress->task_id = $course->id;
            $progress->user_id = $user;
            $progress->type = 'course';
            $progress->save();

            return view("user.courses.take_lesson", compact('course','progress'));
        }
        return view("user.courses.take_lesson", compact('course','progress'));
        
    }
}

