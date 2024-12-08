<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
// use App\Mail\WellcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacte;
use App\Mail\contact;
use App\Models\User;

class EmailController extends Controller
{
    // public function sendWellcomeEmail()
    // {
    //    $toEmail='';
    //    $massage='Hello From Laravel';
    //    $subject='Wellcome Email from Laravel';

    //    Mail::to($toEmail)->send(new WellcomeEmail($massage,$subject));
    // }
    public function contactForm(){
        return view('contact');
    }
    public function contact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
//         dd(auth()->user()->id);
        Contacte::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'user_id'=>auth()->user()->id
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
