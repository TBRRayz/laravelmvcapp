<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        $searchText = $_GET['searchInput'];
        $searchGenre = $_GET['genre'];
        if ($searchGenre == 'All' && $searchText != '') {
            $festivals = Festival::where('festivalName', 'LIKE', '%' . $searchText . '%')
                ->orWhere('title', 'LIKE', '%' . $searchText . '%')
                ->get()->sortByDesc('created_at');
        }
        elseif ($searchText === '' && $searchGenre != 'All') {
            $festivals = Festival::where('genre', $searchGenre)
                ->get()->sortByDesc('created_at');
        }
        else {
            $festivals = Festival::where(function ($query) use ($searchGenre, $searchText) {
                $query->where('festivalName', 'LIKE', '%' . $searchText . '%')
                    ->where('genre', $searchGenre);
            })->orWhere(function ($query) use ($searchGenre, $searchText) {
                $query->where('title', 'LIKE', '%' . $searchText . '%')
                    ->where('genre', $searchGenre);
            })->get()->sortByDesc('created_at');

        }
        return view('search', ['festivals'=>$festivals]);

    }
}
