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
                ->where('status', 1)
                ->get();
            
        } else {
            $knowledges = Knowledge::where('status', 1)->get();
        }
        
        return view("user.knowledge", ['knowledges' => $knowledges]);
    }
    public function show($id)
    {
        $knowledge = Knowledge::find($id);
        if ($knowledge) {
            if (!session()->has('knowledge_view_count_' . $knowledge->id)) {
                $knowledge->view_count += 1;
                $knowledge->save();
                session()->put('knowledge_view_count_' . $knowledge->id, true);
            }
        }
        return view("user.showknowledge", ['knowledge' => $knowledge]);
    }


}
