@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Festivals</h1>
    <a class="btn btn-primary float-right mb-2" href="/festival/create">Add Festival</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                <th scope="col">Genre</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        @foreach($festivals as $festival)
            <tr>
                <th scope="row"><a href="/festival/{{$festival->id}}">{{$festival->id}}</a></th>
                <td>{{ $festival->festivalName }}</td>
                <td>{{ $festival->title }}</td>
                <td>{{ $festival->genre }}</td>
                <td><a href="/festival/{{$festival->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="/festival/delete/{{$festival->id}}" method="post">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
