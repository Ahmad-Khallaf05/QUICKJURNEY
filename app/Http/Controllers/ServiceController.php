<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Trip;
use App\Models\TripImage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $allCategories = Category::all();
        $allTrips = Trip::all();
        return view('service', ['categories' => $allCategories, 'trips' => $allTrips]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        // Get all categories
        $allCategories = category::all();

        // Get trips based on filters
        $query = trip::query();

        if ($request->has('cat_id')) {
            $query->where('cat_id', $request->input('cat_id'));
        }

        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('start_at', [$request->input('start_date'), $request->input('end_date')]);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $trips = $query->get();
//        $cat_name = $query->where('cat_id', $request->input('cat_id'));

        $cat_name=category::where('id', $request->input('cat_id'))->first();
//        dd($cat_name);
//        $trips = trip::where('cat_id', $cat_id)->get();
        return view('service', [
            'categories' => $allCategories,
            'trips' => $trips,
            'selectedCategoryId' =>  $request->input('cat_id'),
               'cat_name' => $cat_name,

        ]);
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
