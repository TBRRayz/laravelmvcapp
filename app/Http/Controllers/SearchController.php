<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search() {
        $searchText = $_GET['searchInput'];
        $festivals = Festival::where('festivalName', 'LIKE', '%'.$searchText.'%')->orWhere('title', 'LIKE', '%'.$searchText.'%')->get();

        return view('search', ['festivals'=>$festivals]);
    }
}
