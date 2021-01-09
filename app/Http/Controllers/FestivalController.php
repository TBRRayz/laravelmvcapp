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
        $this->authorize('create', Festival::class);

        return view('festival.create');
    }

    public function store()
    {
        $this->authorize('create', Festival::class);

        $data = request()->validate([
            'festivalName' => 'required',
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'url' => 'url',
            'festivalImage' => ['required', 'image'],
        ]);

        $imagePath = request('festivalImage')->store('uploads', 'public');

        //auth()->user()->posts()->create

        Festival::create([
            'festivalName' => $data['festivalName'],
            'title' => $data['title'],
            'description' => $data['description'],
            'genre' => $data['genre'],
            'url' => $data['url'],
            'festivalImage' => $imagePath,
        ]);

        //return redirect('/profile/' . auth()->user()->id);
        return redirect('/home');
    }

    public function delete($festival)
    {

        Festival::find($festival)->delete();
        return redirect()->back();
    }
}
