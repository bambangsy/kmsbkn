<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   

        $users = User::all();
        $filter = $request->input('filter');
        if ($filter === null) {
            $filter = 'belum_divalidasi';
        }
        $validated_users = User::where('is_validated', true)->get();
        $not_validated_users = User::where('is_validated', false)->get();

        return view('admin.user_management.user_management', compact('validated_users','not_validated_users','filter'));
    }

    /**
     * Memvalidasi user yang ada di database tabel user.
     */
    public function accept(Request $request,string $id)
    {
        $filter = $request->input('filter');
        $user = User::findOrFail($id);
        $user->is_validated = true;
        $user->email_verified_at = time();
        $user->save();
        
        // Lakukan proses validasi user disini
        
        return redirect()->route('admin.user_management',['filter' => $filter]);
    }

    /**
     * Menolak pembuatan user.
     */
    public function declined(Request $request,string $id)
    {   
        $filter = $request->input('filter');
        $user = User::findOrFail($id);
        $user->is_validated = false;
        $user->save();
        
        // Lakukan proses penolakan pembuatan user disini
        
        return redirect()->route('admin.user_management',['filter' => $filter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user_management.create_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  $request->password;
        $user->save();
        return redirect()->route('admin.user_management');
    
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
    public function destroy(Request $request,string $id)
    {   
        $filter = $request->input('filter');
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user_management',['filter' => $filter]);
    }
}
