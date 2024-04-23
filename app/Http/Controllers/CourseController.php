<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class CourseController extends Controller
// {
//      /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $courses = Course::all();
//         return view("expert.course", ['course' => $courses]);
//     }

//     /**
//      * 
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view("expert.course");
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {   
//         $name = $request->name;
//         $description = $request->description;
//         $file = $request->file('image')->store('post-images');
//         $filePath = 'storage/'.$file;
//         Course::create([
//             'name' => $name,
//             'description' => $description,
//             'file' => $file,
//         ]);
//         return redirect('/dashboard/course');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         return view("expert.show");
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *  */
//     public function edit(string $id)
//     {
//         $courses = Course::find($id);
//         return view("expert.edit", ['knowledge' => $courses]);
//     }
    

//     public function update(Request $request, string $id)
//     {
//         $courses = Course::find($id);
//         $courses->name = $request->name;
//         $courses->description = $request->description;
//         if ($request->image) {
//             $file = $request->file('image')->store('post-images');
//             $filePath = 'storage/'.$file;
//             $courses->file = $file;
         
//         }
//         $courses->save();
//         return redirect('/dashboard/course');
//     }
//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $courses = Course::find($id);
//         $courses->delete();
//         return redirect('/dashboard/co');
//     }
// }
