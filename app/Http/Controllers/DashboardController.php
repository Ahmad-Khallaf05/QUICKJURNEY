<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\User;
use App\Models\trip;
use App\Models\guide;
use App\Models\booking;
use App\Models\testimonial;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $testamonials = testimonial::all();
        $cats= category::all();
        $trips = trip::all();
        $guides = guide::all();
        $bookings = booking::all();
        $users = User::all();

        $custumers=count(User::where('usertype', 'user')->get());
        $admins=count(User::where('usertype', 'admin')->get());

        $inProgressBookings = count(booking::where('status', 'inprogress')->get()) ;
        $completedBookings = count(booking::where('status', 'completed')->get());
        $cancelledBookings = count (booking::where('status', 'cancelled')->get() );

        $data=array(
            'cats'=>$cats,
            'trips'=>$trips,
            'guides'=>$guides,
            'bookings'=>$bookings,
            'inProgressBookings'=>$inProgressBookings,
            'completedBookings'=>$completedBookings,
            'cancelledBookings'=>$cancelledBookings,
            'testamonials'=>$testamonials,
            'custumers'=>$custumers,
            'admins'=>$admins
        );

        return view('dashboard',$data);
    }




}
