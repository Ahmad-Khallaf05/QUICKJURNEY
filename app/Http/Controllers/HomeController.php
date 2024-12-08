<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\guide;
use App\Models\testimonial;
use App\Models\trip;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        $testimonials = testimonial::all();
        $alltrips =trip::all();
        $allguides =guide::all();
        $categories = Category::all();
        return view('landing_page',['testimonials' => $testimonials ,'alltrips'=>$alltrips , 'allguides'=>$allguides , 'categories'=>$categories]);
    }
}
