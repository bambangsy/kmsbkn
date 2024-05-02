<?php

namespace App\Http\Controllers;

use App\Models\Course; // Menambahkan model Course

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
        
            return view("user.pelatihan", ['courses' => $courses, 'sorted_by' => $sorted_by,]);
    }
}

