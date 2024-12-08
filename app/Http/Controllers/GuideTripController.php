<?php

namespace App\Http\Controllers;

use App\Models\guide;
use App\Models\guide_trip;
use Illuminate\Http\Request;

class GuideTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tripid)
    {
//        dd($tripid);
        $allGuides = guide::all();
        return view('dashboard/tripguide.create', compact('allGuides', 'tripid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $tripid)
    {

        \App\Models\guide_trip::class::create(
            [
                'guide_id'=> request('guide_id'),
                'trip_id'=> $tripid,
            ]

        );
        return to_route('trips.showadmin', $tripid);
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
    public function destroy( $guideid,)
    {
        $guide = guide_trip::where('guide_id', $guideid)->first();
        $guide ->delete();
        return redirect()->back();

    }
}
