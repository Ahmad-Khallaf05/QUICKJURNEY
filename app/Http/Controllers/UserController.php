<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers = User::all();
        // dd($allUsers);
        return view("dashboard.users.index", ['users' => $allUsers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' => 'required|numeric',
            'usertype' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $new = new User;
        $new->name = $request->name;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        $new->phone = $request->phone;
        $new->usertype = $request->usertype;
        $new->image = Null;

//        if ($request->hasFile('image')) {
//            $path = $request->file('image')->store('uploads/users', 'public');
//            $new->image = $path;
//        } else {
//            $new->image = null;
//        }

        $new->save();

        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("dashboard.users.edit", ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name'=> $request->input('name'),
            'email'=>$request->input('email'),

            'phone'=> $request->input('phone'),
            'usertype'=> $request->input('usertype'),
            'image'=> $request->input('image'),
        ]);

        return to_route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index');

    }
}
