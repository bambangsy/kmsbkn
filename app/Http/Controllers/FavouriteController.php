<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Favourite;
use App\Models\Path;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $courses = [];
        $pathCourses = [];
        return view('user/favourite',compact('courses','pathCourses'));
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
        
    }
    public function edit_course(string $id)
    {
        
    }
    public function edit_path(string $id)
    {
        
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
        // Delete favourite by id
        Favourite::findOrFail($id)->delete();
        return redirect(route('user.favourite.index'));
    }
}
