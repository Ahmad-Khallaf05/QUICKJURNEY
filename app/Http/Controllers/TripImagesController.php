<?php

namespace App\Http\Controllers;

use App\Models\trip_images;
use Illuminate\Http\Request;

class TripImagesController extends Controller
{

    public function index()
    {

    }


    public function create($tripid)
    {
        //

        return view('dashboard/tripImages.create', compact('tripid'));
    }


    public function store(Request $request, int $tripid)
    {
        // Validate that each file in the 'image' array is a valid image
        $validatedData = $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure each file in the array is an image
        ]);
    
        $images = [];

        if ($request->hasFile('image')) {
            foreach($request->file('image') as $file) {
               
                $filename = time() . '_' . $file->getClientOriginalExtension();
                $path = public_path('uploads/trip_images/');
                $file->move($path, $filename);
    
               
                $images[] = [
                    'image' => 'uploads/trip_images/' . $filename,
                    'trip_id' => $tripid, 
                ];
            }
    
            
            trip_images::insert($images);
        }
    
       
        return to_route('trips.showadmin', $tripid);
    }
    


    public function show(trip_images $trip_images)
    {
        //
    }


    public function edit(trip_images $trip_images)
    {
        //
    }


    public function update(Request $request, trip_images $trip_images)
    {
        //
    }


    public function destroy($id)
    {
        // Find the trip image by its ID
        $tripImage = trip_images::find($id);

        // Delete the image file from the server
        if (file_exists(public_path($tripImage->image))) {
            unlink(public_path($tripImage->image));
        }

        // Delete the image record from the database
        $tripImage->delete();

        // Redirect back to the trip details page with a success message
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

}
