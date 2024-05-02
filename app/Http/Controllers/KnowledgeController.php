<?php

namespace App\Http\Controllers;
use App\Models\Knowledge;

use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
    
        $knowledges = Knowledge::where('user_id', $userId)->get();

        return view("expert.knowledge", ['knowledges' => $knowledges]);
    }

    /**
     * 
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
        $name = $request->name;
        $description = $request->description;
        $file = $request->file('image')->store('post-images');
        $filePath = 'storage/'.$file;
        $userId = auth()->user()->id;
        Knowledge::create([
            'name' => $name,
            'description' => $description,
            'file' => $file,
            'status' => 0,
            'user_id' => $userId
        ]);
        return redirect(route('knowledge'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("expert.show");
    }

    /**
     * Show the form for editing the specified resource.
     *  */
    public function edit(string $id)
    {
        $knowledge = Knowledge::find($id);
        return view("expert.edit", ['knowledge' => $knowledge]);
    }
    

    public function update(Request $request, string $id)
    {
        $knowledge = Knowledge::find($id);
        $knowledge->name = $request->name;
        $knowledge->description = $request->description;
        if ($request->image) {
            $file = $request->file('image')->store('post-images');
            $filePath = 'storage/'.$file;
            $knowledge->file = $file;
         
        }
        $knowledge->save();
        return redirect(route('knowledge'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $knowledge = Knowledge::find($id);
        $knowledge->delete();
        return redirect(route('knowledge'));
    }
}
