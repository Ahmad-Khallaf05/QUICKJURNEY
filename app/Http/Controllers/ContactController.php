<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\contact;
use App\Models\Contacte;



class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Contacts = Contacte::all();
        return view('dashboard/contacte/index', ['contacts' => $Contacts]);
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

        ]);

        $Contact = new Contacte();
        $Contact->contact = $validatedData['contacte'];
        $Contact->user_id = $validatedData['user_id'];
        $Contact->save();

        return redirect()->route('contacte');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacte $contact)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacte $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacte $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $contactid)
    {
        $contact = Contacte::find($contactid);

        $contact->delete();

        return redirect()->route('contacte.index');
    }



    public function contactForm(){
        return view('contacte');
    }
    public function contact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $sender=$request->email;
        $messageContent=$request->message;
        $subject=$request->subject;

        try {

            Mail::to('awaysheh6930@gmail.com')->send(new contact($subject,$messageContent,$sender));

            return back()->with('success', 'Thanks for contacting us!');

        } catch (\Exception $e) {

            Log::error('Error sending email: ' . $e->getMessage());

            return back()->with('error', 'There was an issue sending your message. Please try again later. '.$e->getMessage());

        }
    }


}
