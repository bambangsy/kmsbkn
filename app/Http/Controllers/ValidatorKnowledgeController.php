<?php

namespace App\Http\Controllers;
use App\Models\Knowledge;
use Illuminate\Http\Request;

class ValidatorKnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knowledges = Knowledge::all();
        return view("validator.validasi.validasi", compact('knowledges'));
    }


    public function approve(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Knowledge::findOrFail($id);
    
        // Update the status
        $knowledge->status = 1;
        $knowledge->save();
    
        return redirect()->route('validasiknowledge');
    }

    public function reject(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Knowledge::findOrFail($id);
    
        // Update the status
        $knowledge->status = 2;
        $knowledge->save();
    
        return redirect()->route('validasiknowledge');
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
        //
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
