<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalProfileController extends Controller
{
    public function show(Festival $festival)
    {

        return view('festival.show', [
            'festival' => $festival,
        ]);
    }
}
