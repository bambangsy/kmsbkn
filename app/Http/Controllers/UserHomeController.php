<?php

namespace App\Http\Controllers;
use App\Models\Path;
use App\Models\Knowledge;
use App\Models\Course;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index(Request $request)
    {
        $sorted_by = $request->input('sorted_by');
        $page = $request->input('page', 1);
        $perPage = 3;

        $knowledges = Knowledge::where('status', 1)
            ->orderBy('validated_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        $pathCourses = Path::where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(4, ['*'], 'page', $page);

        $courses = Course::where('status', 1)
            ->orderBy('validated_at', 'desc')
            ->paginate(3, ['*'], 'page', $page);

        $rank = (new UserRankingController)->get_rank();

        return view("user.home", compact('pathCourses', 'knowledges', 'courses','rank'));
    }
}
