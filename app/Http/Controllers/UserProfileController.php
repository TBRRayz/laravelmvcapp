<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('user.user', [
            'user' => $user,
        ]);
    }
}
