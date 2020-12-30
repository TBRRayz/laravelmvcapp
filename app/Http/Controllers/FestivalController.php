<?php

namespace App\Http\Controllers;
use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


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

        $imagePath = request('festivalImage')->store('uploads', 'public');

        //auth()->user()->posts()->create

        \App\Models\Festival::create([
            'festivalName' => $data['festivalName'],
            'title' => $data['title'],
            'description' => $data['description'],
            'festivalImage' => $imagePath,
        ]);

        //return redirect('/profile/' . auth()->user()->id);
        return redirect('/home');
    }
}
