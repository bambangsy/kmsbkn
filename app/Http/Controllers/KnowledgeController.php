<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("expert.knowledge");
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
        $name = $request->name;
        $description = $request->description;
        $file = $request->file;
        return dd([$name,$description,$file]);
        #return redirect('/dashboard/pelatihan');
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
     */
    public function edit(string $id)
    {
        return view("expert.edit");
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
        //
    }
}
