@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/defqon_logo.svg" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>13</strong> Likes</div>
                <div class="pr-5"><strong>124</strong> comments</div>
            </div>
            <div class="pt-4 font-weight-bold"> {{ $user->userProfile->title }}</div>
            <div>{{ $user->userProfile->description }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-2 p-5">
            <img src="/svg/defqon_logo.svg" class="rounded-circle w-100">
        </div>
        <div class="col-2 p-5">
            <img src="/svg/decibel.svg" class="rounded-circle w-100">
        </div>
        <div class="col-2 p-5">
            <img src="/svg/qbase.svg" class="rounded-circle w-100">
        </div>
        <div class="col-2 p-5">
            <img src="/svg/decibel.svg" class="rounded-circle w-100">
        </div>
        <div class="col-2 p-5">
            <img src="/svg/qbase.svg" class="rounded-circle w-100">
        </div>
        <div class="col-2 p-5">
            <img src="/svg/defqon_logo.svg" class="rounded-circle w-100">
        </div>

    </div>
</div>
@endsection
