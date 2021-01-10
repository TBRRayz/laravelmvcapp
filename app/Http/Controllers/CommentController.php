<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\FestivalComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Festival $festival)
    {
        $userId = auth()->user()->getAuthIdentifier();

        auth()->user()->comments()->create([
            'festival_id' => $festival->id,
            'user_id' => $userId,
            'content' => request('content')
        ]);


        return back();
    }

    public function delete($comment)
    {
        $this->authorize('delete', [FestivalComment::class, $comment]);

        FestivalComment::find($comment)->delete();
        return redirect()->back();
    }
}
