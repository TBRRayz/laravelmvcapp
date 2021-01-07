@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->userProfile->userProfileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->checkIn->count() }}</strong> check-ins</div>
                <div class="pr-5"><strong>124</strong> comments</div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->userProfile->title }}</div>
            <div>{{ $user->userProfile->description }}</div>
        </div>
    </div>
    <div><h1>Check-ins</h1></div>
    <div class="row">
        @foreach($festivals as $festival)
        <div class="col-3 p-5">
            <div><h4>{{ $festival->festivalName }}</h4></div>
            <div><h6>{{ $festival->title }}</h6></div>
            <img src="/storage/{{ $festival->festivalImage }}" class="rounded-circle w-100">
        </div>
        @endforeach

    </div>
</div>
@endsection
