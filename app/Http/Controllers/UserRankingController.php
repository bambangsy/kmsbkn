<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogPoint;
use App\Models\Point;
use Spatie\Permission\Traits\HasRole;


class UserRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        

        $usersWithPoints = self::get_rank();
      
        return view('user/rank',compact('usersWithPoints'));
        
    }

    public function get_rank(){
        $points = Point::all();
        $users = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'user')->toArray()
        );
        $usersWithPoints = $points->map(function ($point) use ($users) {
            $userPoint = $users->where('id', $point->user_id)->first();
            $point->name = $userPoint ? $userPoint->name : 0;
            return $point;
        });
        
       
        $usersWithPointsData = $usersWithPoints->map(function ($user) {
            return [
                'name' => $user->name,
                'point' => $user->point,
            ];
        })->toArray();
        $usersWithPoints= $usersWithPointsData;
        $usersWithPoints = collect($usersWithPoints)->sortByDesc('point')->values()->all();

        return $usersWithPoints;
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
