@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 p-5">
            <img src="/storage/{{ $festival->festivalImage }}" class="w-100">
        </div>
        <div class="col-6 p-5">
            <div><h1>{{ $festival->festivalName }}</h1></div>
            @can('viewAny', \App\Models\Festival::class)
                <check-button festival-id="{{ $festival->id }}" check-ins="{{ $checksIns }}"></check-button>
            @endcan

            <div class="pt-4 font-weight-bold">{{ $festival->title }}</div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $festival->checkIns->count() }}</strong> check-ins</div>
                <div class="pr-5"><strong>{{ $festival->comments->count() }}</strong> comments</div>
            </div>
            <div class="pt-2">Genre: {{ $festival->genre }}</div>
            <div class="pt-2">{{ $festival->description }}</div>
            <div class="pt-2"><a href="{{ $festival->url }}">{{ $festival->url }}</a></div>
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
                        <div class="col-9 pl-4">
                            <div><a href="/user/{{$comment->user->id}}">{{$comment->user->username}}</a></div>
                            <div pt-4>{{ $comment->content }}</div>
                        </div>
                        <div class="col-2">
                            <div class="float-right pr-2">
                            {{ $comment->created_at->diffForHumans() }}
                            </div>
                            @can('delete', [\App\Models\FestivalComment::class, $comment])
                            <form class="float-right pt-4" action="/comment/delete/{{$comment->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right ml-3 mr-1">Delete</button>
                            </form>
                            @endcan
                        </div>



                    </div>
                </div>
            @endforeach
    </div>
    @can('viewAny', \App\Models\Festival::class)
    <div class="card mt-2">
        <div class="card-block">
            @can('create', \App\Models\FestivalComment::class)
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
            @else
                <div>You can add a comment when you have 5 checkIns</div>
            @endcan
        </div>
        @endcan
    </div>

</div>
@endsection
