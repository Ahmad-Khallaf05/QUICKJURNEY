<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("include.user_side.show",['user'=>$user]);
    }



    public function showadmin(User $user)
    {
        return view("dashboard/admin_profile",['user'=>$user]);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($user->email != $request->input('email')){
            $user->email_verified_at=null;
            $user->save();
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the profile photo upload
        if ($request->hasFile('image')) {
            // Check if the old photo exists
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                // Delete the old profile photo
                Storage::disk('public')->delete($user->image);
            }

            // Store the new profile photo
            $filename = $request->file('image')->store('profile_photos', 'public');
            $user->image = $filename;
        }

        // Update user details
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image' => $user->image
        ]);

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully!');
    }




}
