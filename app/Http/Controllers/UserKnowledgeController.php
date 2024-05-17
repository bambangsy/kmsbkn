<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Knowledge;
use Illuminate\Http\Request;

class UserKnowledgeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sorted_by = $request->input('sorted_by');
        $page = $request->input('page', 1);
        $perPage = 9;

        $knowledges = Knowledge::where('status', 1)
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

            $knowledges->getCollection()->transform(function ($knowledge) {
                $createdBy = User::find($knowledge->user_id);
                $knowledge->created_by = $createdBy ? $createdBy->name : null;
                return $knowledge;
            });
            


        return view("user.knowledge", ['knowledges' => $knowledges,'sorted_by' => $sorted_by,]);
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
