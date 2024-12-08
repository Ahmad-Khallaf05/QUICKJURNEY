<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::all();
        return view('dashboard/guides/index', compact('guides'));
    }

    public function create()
    {
        return view('dashboard/guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'age' => 'required|string|max:10',
            'gender' => 'required|string|max:10',
        ]);

        $guide = new Guide($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->move(public_path('images/guides'), $imageName);
            $guide->image = 'images/guides/' . $imageName;
        }

        $guide->save();

        return redirect()->route('guides.index')
            ->with('success', 'Guide created successfully.');
    }

    public function show(Guide $guide)
    {
        return view('dashboard/guides.show', compact('guide'));
    }

    public function view()
    {
        $guides = Guide::all();
        return view('home.guidesview', compact('guides'));
    }

    public function anotherPage($id) {
        $guide = Guide::findOrFail($id); 
        return view('home.guide', ['id' => $id ,'guide' =>$guide]);
    }
    

    public function edit(Guide $guide)
    {
        return view('dashboard/guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'age' => 'required|string|max:10',
            'gender' => 'required|string|max:10',
        ]);

        $guide->fill($request->except('image'));

        if ($request->hasFile('image')) {
            // Delete old image
            if ($guide->image && file_exists(public_path($guide->image))) {
                unlink(public_path($guide->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->move(public_path('images/guides'), $imageName);
            $guide->image = 'images/guides/' . $imageName;
        }

        $guide->save();

        return redirect()->route('guides.index')
            ->with('success', 'Guide updated successfully.');
    }

    public function destroy(Guide $guide)
    {
        if ($guide->image && file_exists(public_path($guide->image))) {
            unlink(public_path($guide->image));
        }

        $guide->delete();

        return redirect()->route('guides.index')
            ->with('success', 'Guide deleted successfully.');
    }
}