<?php

namespace App\Http\Controllers;

use App\Models\Path;

use Illuminate\Http\Request;


class UserCoursePathController extends Controller
{
    public function index()
    {
        $pathCourses = Path::all();


        return view("user.alur-belajar", ['pathCourses' => $pathCourses]);
    }
}
