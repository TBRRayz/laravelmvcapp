<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexFestival()
    {
        $this->authorize('create', Festival::class);

        $festivalData = Festival::all();
        return view('admin.festival', ['festivals'=>$festivalData]);
    }

    public function indexUser()
    {
        $this->authorize('create', Festival::class);
        $userData = User::all();
        return view('admin.user', ['users'=>$userData]);
    }
}
