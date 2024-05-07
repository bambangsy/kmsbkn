<?php

namespace App\Http\Controllers;

use App\Models\Path;
use App\Models\Course;

use Illuminate\Http\Request;


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
}
