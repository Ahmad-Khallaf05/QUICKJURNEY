<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use App\Models\User;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = testimonial::all();
        $users = User::all();
        return view('dashboard/testimonials/index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'testimonial' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $testimonial = new Testimonial();
        $testimonial->testimonial = $validatedData['testimonial'];
        $testimonial->user_id = $validatedData['user_id']; // تعيين قيمة user_id
        $testimonial->save();

        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $testimonials = testimonial::all();
        $users = User::all();

        return view('dashboard/testimonials/index', ['testimonials' => $testimonials]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index');    }
}
