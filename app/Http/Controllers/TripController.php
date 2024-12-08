<?php

namespace App\Http\Controllers;

use App\Models\guide;
use App\Models\guide_trip;
use App\Models\trip;
use App\Models\category;
use App\Models\trip_feedback;
use App\Models\trip_images;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alltrips =trip::all();
        return view("dashboard/trips/index", ['trips'=>$alltrips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcat= category::all();
        return view('dashboard/trips/create',['categories'=>$allcat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        trip::create([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),
        ]);
        return to_route('trips.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($tripid)
    {
        $trip = Trip::find($tripid);
        $tripGuids = Guide_Trip::where('trip_id', $tripid)->get();
        $guides = [];
        foreach ($tripGuids as $tripGuid) {
            $guide = Guide::find($tripGuid->guide_id);
            array_push($guides, $guide);
        }
        $tripImages = Trip_Images::where('trip_id', $tripid)->get();

        // Fetch feedbacks for this trip
        $feedbacks = Trip_Images::where('trip_id', $tripid)->get();
            //trip_feedback::where('trip_id', $tripid)->get();

        return view('dashboard/trips/show', [
            'feedbacks' => $feedbacks, // pass feedbacks to the view
            'tripImages' => $tripImages,
            'tripGuids' => $guides,
            'trip' => $trip,

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trip $trip)
    {

        $allcat= category::all();
        return view('dashboard/trips/edit',['categories'=>$allcat , 'trip'=>$trip]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trip $trip)
    {
        $trip->update([
            'name'=>$request->input('name'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'start_at'=>$request->input('start_at'),
            'end_at'=>$request->input('end_at'),
            'cat_id'=>$request->input('cat_id'),

        ]);
        return to_route('trips.index',['trips'=>$trip]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($trip)
    {
        $trip->delete();
        return to_route('trips.index');
    }



    public function showBooking($tripid)
    {
        // Find the trip by ID
        $trip = Trip::find($tripid);

        // Get all the guide_trip records related to this trip
        $tripGuids = Guide_Trip::where('trip_id', $tripid)->get();

        // Initialize an empty array to hold the guide details
        $guides = [];

        // Loop through each guide_trip record
        foreach ($tripGuids as $tripGuid) {
            // Find the guide by its ID and add it to the $guides array
            $guide = Guide::find($tripGuid->guide_id);
            array_push($guides, $guide);
        }

        // Get all the images associated with the trip
        $tripImages = Trip_Images::where('trip_id', $tripid)->get();
        $feedbacks = trip_feedback::where('trip_id', $tripid)->get();
//        dd($feedbacks);
        //

        // Pass the trip, guides, and images data to the view
        return view('dashboard/trips/show', [
            'tripImages' => $tripImages,
            'tripGuids' => $guides,
            'trip' => $trip,
            'feedbacks' => $feedbacks, // pass feedbacks to the view
        ]);
    }





    public function book(Request $request, $tripid)
    {
        // Validate the incoming request data if needed
        $request->validate([
            // Add validation rules if needed
        ]);

        // Insert the booking data into the database
        $booking = Booking::create([
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'trip_id' => $tripid,    // Get the trip ID from the route
            'status'  => 'inprogress', // Or you could set it as 'pending' initially
        ]);

        // Send a confirmation email to the user
        $user = Auth::user();
        Mail::to($user->email)->send(new BookingConfirmation($booking));

        // Redirect or return a response
        return redirect()->back()->with('success', 'please check your email to confirm your booking');
    }



    public function confirm($id)
    {
        try {
            $booking = Booking::find($id);

            $booking->update(['status' => 'completed']);

            return redirect()->route('trips.showBooking', $booking->trip_id)->with('success', 'Your booking has been confirmed!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while confirming the booking:' . $e->getMessage());
        }
    }


    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);

        $q = $request->q;

        $alltrips = trip::all();

        $filtertrips = trip::where('name', 'like', '%' . $q . '%')->get();

        if ($filtertrips->count()) {
            return view('dashboard/trips/index', [
                'trips' => $filtertrips,
            ]);
        } else {
            return redirect()->route('trips.index')->with([

                'static' => 'No trips found'

            ]);
        }
    }




    public function  showadmin($tripid){
        // Find the trip by ID
        $trip = Trip::find($tripid);

        // Get all the guide_trip records related to this trip
        $tripGuids = Guide_Trip::where('trip_id', $tripid)->get();

        // Initialize an empty array to hold the guide details
        $guides = [];

        // Loop through each guide_trip record
        foreach ($tripGuids as $tripGuid) {
            // Find the guide by its ID and add it to the $guides array
            $guide = Guide::find($tripGuid->guide_id);
            array_push($guides, $guide);
        }

        // Get all the images associated with the trip
        $tripImages = Trip_Images::where('trip_id', $tripid)->get();

        // Pass the trip, guides, and images data to the view
        return view('dashboard/trips/show_userside', [
            'tripImages' => $tripImages,
            'tripGuids' => $guides,
            'trip' => $trip
        ]);

    }
    public function storeFeedback(Request $request, $tripid)
    {
        $request->validate([
            'feedback' => 'required',
        ]);

        trip_feedback::create([
            'trip_id' => $tripid,
            'user_id' => Auth::id(),
            'feedback' => $request->input('feedback'),
        ]);

        return redirect()->back();
    }



}



