<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $festivalsId = $user->checkIn()->pluck('festivals.id');

        $festivals = Festival::whereIn('festivals.id', $festivalsId)->latest()->get();

        return view('user.user', [
            'user' => $user,
            'festivals' => $festivals,
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

            $imageArray = ['Image' => $imagePath];
        }

        $user->userProfile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/user/{$user->id}");

    }

    public function delete(User $user)
    {
        $this->authorize('create', Festival::class);
        UserProfile::where('user_id', $user->id)->delete();
        User::find($user->id)->delete();
        return redirect()->back();
    }
}
