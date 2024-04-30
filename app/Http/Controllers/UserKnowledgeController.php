<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;

use Illuminate\Http\Request;

class UserKnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $knowledges = Knowledge::where('name', 'LIKE', "%{$search}%")
                ->get();
            
        } else {
            $knowledges = Knowledge::all();
        }
        
        return view("user.knowledge", ['knowledges' => $knowledges]);
    }
    public function show($id)
    {
        $knowledge = Knowledge::find($id);
        return view("user.showknowledge", ['knowledge' => $knowledge]);
    }


}
