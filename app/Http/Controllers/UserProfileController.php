<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(User $user)
    {

        return view('user.user', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', [UserProfile::class, $user->userProfile]);

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user) {

        $this->authorize('update', [UserProfile::class, $user->userProfile]);

        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',
            'Image' => 'image',
        ]);

        if (request('Image')) {
            $imagePath = request('Image')->store('userProfile', 'public');

        }

        $user->userProfile()->update(array_merge(
            $data,
            ['Image' => $imagePath]
        ));

        return redirect("/user/{$user->id}");

    }
}
