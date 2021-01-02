@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/festival/{{$festival->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">
                <div class="row col-md-6 offset-md-4">
                    <h1>Edit Festival</h1>
                </div>
                <div class="form-group row pt-4">
                    <label for="festivalName" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="festivalName"
                               type="text"
                               class="form-control @error('festivalName') is-invalid @enderror"
                               name="festivalName"
                               value="{{ old('festivalName') ?? $festival->festivalName }}"
                               required
                               autocomplete="festivalName" autofocus>

                        @error('festivalName')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Tile</label>

                    <div class="col-md-6">
                        <input id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') ?? $festival->title }}"
                               required
                               autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror"
                               name="description"
                               value="{{ old('description') ?? $festival->description }}"
                               required
                               autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                    <div class="col-md-6">
                        <input id="url"
                               type="text"
                               class="form-control @error('url') is-invalid @enderror"
                               name="url"
                               value="{{ old('url') ?? $festival->url }}"
                               required
                               autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="festivalImage" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <input type="file" class="form-control-file" id="festivalImage" name="festivalImage">

                        @error('festivalImage')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary">Save Festival</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
