<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function create()
    {
        return view('festival.create');
    }

    public function store()
    {
        $data = request()->validate([
            'festivalName' => 'required',
            'title' => 'required',
            'description' => 'required',
            'festivalImage' => ['required', 'image'],
        ]);

        \App\Models\Festival::create($data);

        dd(request()->all());
    }
}
