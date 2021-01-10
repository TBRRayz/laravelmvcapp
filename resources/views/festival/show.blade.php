@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 p-5">
            <img src="/storage/{{ $festival->festivalImage }}" class="w-100">
        </div>
        <div class="col-6 p-5">
            <div><h1>{{ $festival->festivalName }}</h1></div>
            <check-button festival-id="{{ $festival->id }}" check-ins="{{ $checksIns }}"></check-button>

            <div class="pt-4 font-weight-bold">{{ $festival->title }}</div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $festival->checkIns->count() }}</strong> check-ins</div>
                <div class="pr-5"><strong>124</strong> comments</div>
            </div>
            <div class="pt-2">Genre: {{ $festival->genre }}</div>
            <div class="pt-2">{{ $festival->description }}</div>
            <div class="pt-2">{{ $festival->url }}</div>
        </div>
    </div>
    <hr>
    <div class="comments">
            @foreach($festival->comments as $comment)
                <div class="card mt-2">
                    <div class="row mt-4 mb-4 ml-2">
                        <div class="col-1">
                            <img src="{{ $comment->user->userProfile->userProfileImage() }}" class="rounded-circle" :width="[80]">
                        </div>
                        <div class="col-9 pl-4 pt-4">
                            {{ $comment->content }}
                        </div>
                        <div class="col-2">
                            <div class="float-right pr-2">
                            {{ $comment->created_at->diffForHumans() }}
                            </div>
                            @can('delete', [\App\Models\FestivalComment::class, $comment])
                            <form class="float-right pt-4 pr-2" action="/comment/delete/{{$comment->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                        </div>



                    </div>
                </div>
            @endforeach
    </div>

    <div class="card mt-2">
        <div class="card-block">
            <form method="post" action="/festival/{{ $festival->id }}/comments">
                @csrf
                <div class="form-group m-2">
                    <textarea name="content" placeholder="your comment." class="form-control" required>

                    </textarea>
                </div>

                <div class="form-group m-2">
                    <button type="submit" class="btn btn-primary">Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
