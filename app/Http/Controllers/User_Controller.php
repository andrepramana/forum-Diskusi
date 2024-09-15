<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class User_Controller extends Controller
{
    public function show(User $user)
    {
        return view(
            'profile',
            [
                "title" => $user->name,
                "users" => $user->load(['posts', 'comments']),
                "posts" => Post::where('user_id', $user->id)->with('user', 'category', 'comments')->orderBy('id', 'desc')->get(),
            ]
        );
    }

    public function edit(User $user)
    {
        return view(
            'edit_profile',
            [
                "title" => "Edit Profile",
                "users" => auth()->user()
            ]
        );
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $user = Auth::user();


        $user->name = $request->input('name');

        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
