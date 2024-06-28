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
        $paginationCount = 3;
        $knowledges_queue = Knowledge::whereNull('is_currently_checked_by')->paginate($paginationCount, ['*'], 'queue_page');
        $knowledges_checked = Knowledge::where('is_currently_checked_by', auth()->id())->where('status', 0)->paginate($paginationCount, ['*'], 'checked_page');
        $knowledges_approved = Knowledge::where('status', 1)->paginate($paginationCount, ['*'], 'approved_page');
        $knowledges_rejected = Knowledge::where('status', 2)->paginate($paginationCount, ['*'], 'rejected_page');
        
        return view("validator.validasi.validasi", compact('knowledges_queue', 'knowledges_checked', 'knowledges_approved', 'knowledges_rejected'));
    }


    public function approve(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Knowledge::findOrFail($id);
    
        // Update the status
        $knowledge->status = 1;
       
        $knowledge->validated_at = now();
        $knowledge->save();
    
        return redirect()->route('validasiknowledge');
    }

    public function retrieve(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Knowledge::findOrFail($id);
        if ($knowledge->is_currently_checked_by == null) {
            $knowledge->is_currently_checked_by = auth()->id();
            $knowledge->save();
            return redirect()->route('validasiknowledge');
        }
        else{
            return redirect()->route('validasiknowledge')->with('warning', 'Pengetahuan ini sedang divalidasi oleh validator lain');
        }
        
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
    public function cancel(Request $request, $id)
    {
        $id = $request->id;
        $knowledge = Knowledge::findOrFail($id);
        $knowledge->is_currently_checked_by = null;
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

