<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function store(Festival $festival)
    {
       return auth()->user()->checkIn()->toggle($festival);
    }
}
