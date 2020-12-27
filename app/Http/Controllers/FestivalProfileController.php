<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalProfileController extends Controller
{
    public function index($festival)
    {
        $festival = Festival::find($festival);
        return view('home', [
            'festival' => $festival,
        ]);
    }
}
