<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Knowledge;
use App\Models\Course;
use Illuminate\Http\Request;


class UserHomeController extends Controller
{
    public function index(Request $request){

        $pathCourses = Path::all();
        $knowledges = Knowledge::all();
        $courses = Course::all();
            return view('user.home', compact('pathCourses', 'knowledges', 'courses'));
    }
}
