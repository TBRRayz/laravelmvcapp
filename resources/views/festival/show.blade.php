@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 p-5">
            <img src="/storage/{{$festival->festivalImage}}" class="w-100">
        </div>
        <div class="col-6 p-5">
            <div><h1>{{ $festival->festivalName }}</h1></div>
            <check-button festival-id="{{ $festival->id }}" check-ins="{{ $checksIns }}"></check-button>

            <div class="pt-4 font-weight-bold">{{ $festival->title }}</div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $festival->checkIns->count() }}</strong> check-ins</div>
                <div class="pr-5"><strong>124</strong> comments</div>
            </div>
            <div class="pt-2">{{ $festival->description }}</div>
            <div class="pt-2">{{ $festival->url }}</div>
        </div>
    </div>
</div>
@endsection
