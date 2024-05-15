<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Knowledge;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\UserRankingController;


class UserHomeController extends Controller
{
    public function index(Request $request){

        $pathCourses = Path::all();
        $knowledges = Knowledge::all();
        $courses = Course::all();
        // Start of Selection
        $rank = (new UserRankingController)->get_rank();
       
        return view('user.home', compact('pathCourses', 'knowledges', 'courses','rank'));
    }
}
