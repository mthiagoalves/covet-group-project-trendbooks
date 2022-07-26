@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page</h1>

    <h2 class="title-admin">Create your books</h2>

    <form action="/books/create" method="POST" class="label-input" enctype="multipart/form-data">
        @csrf

        <label>Title of the book</label>
        <input class="form-control" type="text" placeholder="Title..." name="title" id="title">
        <label >Author</label>
        <input class="form-control" type="text" placeholder="Author..." name="author" id="author">
        <label >Description</label>
        <input class="form-control" type="text" placeholder="Description..." name="description" id="description">
        <label >Price</label>
        <input class="form-control" type="text" placeholder="Price..." name="price" id="price">

        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="genre_id">
            <option selected>Open this select menu</option>
            @foreach ($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre}}</option>
            @endforeach
        </select>

        <label >Select book image</label>
        <input class="form-control" type="file" name="image" id="image">

        <button type="submit" class="btn btn-primary"> Create </button>
    </form>


@endsection
