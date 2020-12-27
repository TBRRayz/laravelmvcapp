<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalProfileController extends Controller
{
    public function index($festival)
    {
        $festival = Festival::findOrFail($festival);
        return view('home', [
            'festival' => $festival,
        ]);
    }
}