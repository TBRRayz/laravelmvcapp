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

        $festival->update($data);

        return redirect("/festival/{$festival->id}");

    }
}
