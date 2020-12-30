@extends('layouts.app')

@section('content')
<div class="container">
        @foreach($festivals as $festival)
        <div class="row">
            <div class="col-3 p-5">
                <img src="/storage/{{ $festival->festivalImage }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 p-5">
                <div><h1>{{ $festival->festivalName }}</h1></div>
                <div class="d-flex">
                    <div class="pr-5"><strong>13</strong> Likes</div>
                    <div class="pr-5"><strong>124</strong> comments</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $festival->title }}</div>
                <div>{{ $festival->description }}</div>
            </div>

        </div>
        @endforeach
</div>
@endsection
