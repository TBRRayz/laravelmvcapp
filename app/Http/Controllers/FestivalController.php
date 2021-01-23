<?php

namespace App\Http\Controllers;
use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{

    public function show(Festival $festival)
    {
        $checksIns = (auth()->user()) ? auth()->user()->checkIn->contains($festival->id) : false;

        return view('festival.show', [
            'festival' => $festival,
            'checksIns' => $checksIns,
        ]);
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
            'status' => false,
            'festivalImage' => $imagePath,
        ]);

        //return redirect('/profile/' . auth()->user()->id);
        return redirect('/home');
    }

    public  function edit(Festival $festival) {

        $this->authorize('update', [Festival::class, $festival]);

        return view('festival.edit', [
            'festival' => $festival,
        ]);
    }

    public function update(Festival $festival) {

        $this->authorize('update', [Festival::class, $festival]);
        $data = request()->validate([
            'festivalName' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'festivalImage' => 'image',
        ]);

        if ('festivalImage' > 2) {
            $imagePath = request('festivalImage')->store('uploads', 'public');
        }
        else {
            $imagePath = $festival->festivalImage;
        }

        $festival->update([
            'festivalName' => $data['festivalName'],
            'title' => $data['title'],
            'description' => $data['description'],
            'url' => $data['url'],
            'festivalImage' => $imagePath,
        ]);

        return redirect("/festival/{$festival->id}");

    }

    public function delete($festival)
    {
        $this->authorize('delete', Festival::class);

        Festival::find($festival)->delete();
        return redirect()->back();
    }

    public function statusUpdate(Festival $festival)
    {
        $this->authorize('update', [Festival::class, $festival]);
        if($festival->status === '1'){
            $festival->status = false;
        }else {
            $festival->status = true;
        }
        $festival->save();
    }
}
