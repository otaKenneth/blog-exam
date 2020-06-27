@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">@csrf<div class="row">
        <div class="col-8 offset-2">

            <div class="row">
                <h1>Add New Post</h1>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label">Post Image</label>
            
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image">
            
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label">Title</label>

                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label">Description</label>

                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autofocus cols="30" rows="7"></textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="row pt-4">
                <button class="btn btn-primary">Add New Post</button>
            </div>

        </div>
    </div></form>
</div>
@endsection
