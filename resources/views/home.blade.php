@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline ml-auto" type="get" action="/search">
            <input class="form-control" name="searchInput" type="text">
            <button class="btn btn-primary ml-2" type="submit">Search</button>
            <select class="form-control ml-2" id="genre" name="genre" required autocomplete="genre">
                <option value="All">All</option>
                <option value="Deephouse">Deephouse</option>
                <option value="Deephouse">Electro</option>
                <option value="Hardcore">Hardcore</option>
                <option value="Hardstyle">Hardstyle</option>
                <option value="House">House</option>
                <option value="Pop">Pop</option>
                <option value="R&B">R&B</option>
                <option value="Rock">Rock</option>
                <option value="Techno">Techno</option>
                <option value="Trance">Trance</option>
                <option value="Urban">Urban</option>
            </select>
        </form>
    </div>
        @foreach($festivals as $festival)
        <div class="row">
            <div class="col-3 p-5">
                <a href="/festival/{{$festival->id}}">
                    <img src="/storage/app/public{{ $festival->festivalImage }}" class="rounded-circle w-100">
                </a>
            </div>
            <div class="col-9 p-5">
                <div><h1>{{ $festival->festivalName }}</h1></div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $festival->checkIns->count() }}</strong> check-ins</div>
                    <div class="pr-5"><strong>{{ $festival->comments->count() }}</strong> comments</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $festival->title }}</div>
            </div>

        </div>
        @endforeach
</div>
@endsection
