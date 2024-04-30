<?php

namespace App\Http\Controllers;
use App\Models\Knowledge;

use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortField = $request->input('sort', 'newest') == 'newest' ? 'created_at' : 'views';
        $sortOrder = $sortField == 'created_at' ? 'desc' : 'asc';
        $knowledges = Knowledge::where('status', 1)->orderBy($sortField, $sortOrder)->get();
        return view("expert.knowledge", compact('knowledges'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("expert.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('image')->store('post-images');
        $filePath = 'storage/'.$file;

        $knowledge = Knowledge::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'file' => $filePath,
            'status' => 0
        ]);

        return redirect(route('knowledge.index'))->with('success', 'Knowledge has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Knowledge $knowledge)
    {
        return view("expert.show", compact('knowledge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knowledge $knowledge)
    {
        return view("expert.edit", compact('knowledge'));
    }
    

    public function update(Request $request, Knowledge $knowledge)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $knowledge->name = $validatedData['name'];
        $knowledge->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('post-images');
            $filePath = 'storage/'.$file;
            $knowledge->file = $filePath;
        }

        $knowledge->save();

        return redirect(route('knowledge.index'))->with('success', 'Knowledge has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knowledge $knowledge)
    {
        $knowledge->delete();
        return redirect(route('knowledge.index'))->with('success', 'Knowledge has been deleted successfully.');
    }
}
