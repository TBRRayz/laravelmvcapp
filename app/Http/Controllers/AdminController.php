<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexFestival()
    {
        $festivalData = Festival::all();
        return view('admin.festival', ['festivals'=>$festivalData]);
    }

    public function indexUser()
    {
        $userData = User::all();
        return view('admin.user', ['users'=>$userData]);
    }
}
