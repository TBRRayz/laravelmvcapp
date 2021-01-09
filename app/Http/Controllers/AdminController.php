<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $festivalData = Festival::all();
        return view('admin.festival', ['festivals'=>$festivalData]);
    }
}
