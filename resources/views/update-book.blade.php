@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page </h1>

    <h2 class="title-admin">Update your books</h2>

    <form action="/books/update/{{$books->id}}" enctype="multipart/form-data" method="POST" class="label-input">
        @csrf
        @method('PUT')

        <label>Title of the book</label>
        <input class="form-control" type="text" placeholder="Title..." name="title" id="title" value="{{$books->title}}">
        <label >Price</label>
        <input class="form-control" type="text" placeholder="Price..." name="price" id="price" value="{{$books->price}}">
        <label >Select book image</label>
        <input class="form-control" type="file" name="image" id="image" value="{{$books->image}}">

        <button type="submit" class="btn btn-primary"> Update </button>

    </form>

@endsection
