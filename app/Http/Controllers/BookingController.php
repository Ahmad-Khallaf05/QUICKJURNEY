<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = booking::all();

        return view('dashboard.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     */
    public function show(booking $booking)
    {

        $booking->read = 1;
        $booking->save();
        return view('dashboard.bookings.view', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(booking $booking)
    {
        return view('dashboard.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, booking $booking)
    {
        try{
            $booking->update($request->all());
            return redirect()->back() ->with('success', 'booking has been updated!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while updating the booking:' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( booking $booking)
    {
        try{

            $booking->delete();
            return redirect()->back()->with('success', 'booking has been deleted!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occurred while updating the booking:' . $e->getMessage());
        }

    }

    public function accept(booking $booking,$id)
    {
        $booking = booking::find($id);
        $booking->update(['accepted' => 1]);
        return redirect()->back();
    }
    public function confirm(booking $booking,$id)
    {
        try {
            $booking = Booking::find($id);

            $booking->update(['status' => 'completed']);

            return redirect()->back()->with('success', 'booking has been confirmed!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while confirming the booking:' . $e->getMessage());
        }
    }
}
