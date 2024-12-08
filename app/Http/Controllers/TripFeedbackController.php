<?php

namespace App\Http\Controllers;

use App\Models\trip_feedback;
use Illuminate\Http\Request;

class TripFeedbackController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $tripid)
    {
        $request->validate([
            'feedback' => 'required',
        ]);

        trip_feedback::create([
            'trip_id' => $tripid,
            'user_id' => Auth::id(),
            'feedback' => $request->input('feedback'),
        ]);

        return redirect()->route('trips.show', $tripid)->with('success', 'Feedback submitted!');
    }


    /**
     * Display the specified resource.
     */
    public function show(trip_feedback $trip_feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trip_feedback $trip_feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trip_feedback $trip_feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trip_feedback $trip_feedback)
    {
        //
    }
}
