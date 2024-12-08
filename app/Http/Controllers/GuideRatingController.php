<?php

namespace App\Http\Controllers;

use App\Models\guide_rating;
use App\Models\GuideRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Here you might want to show all ratings, but typically this would be part of an admin dashboard.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not necessary since we're allowing users to rate from the guide's profile page.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $guideId)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
        ]);

       
        $existingRating = Guide_Rating::where('guide_id', $guideId)->where('user_id', Auth::id())->first();

        if ($existingRating) {
            
            $existingRating->rate = $request->input('rate');
            $existingRating->save();
        } else {
            
            Guide_Rating::create([
                'rate' => $request->input('rate'),
                'guide_id' => $guideId,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->route('home.guide', $guideId)
            ->with('success', 'Your rating has been submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guide_Rating $guide_rating)
    {
        // Show a specific rating (not typically necessary for users, more for admins).
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide_Rating $guide_rating)
    {
        // Not necessary since ratings are edited directly via the form on the guide's profile.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide_Rating $guide_rating)
    {
        // Not necessary since we're handling updates in the store method.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guide_rating $guide_rating)
    {
        
        $guide_rating->delete();

        return redirect()->back()->with('success', 'Rating deleted successfully.');
    }
}