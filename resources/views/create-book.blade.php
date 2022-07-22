@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page</h1>

    <h2 class="title-admin">Create your books</h2>

    <form action="/books/create" enctype="multipart/form-data" method="POST" class="label-input">
        @csrf

        <label>Title of the book</label>
        <input class="form-control" type="text" placeholder="Title..." name="title" id="title">
        <label >Price</label>
        <input class="form-control" type="text" placeholder="Price..." name="price" id="price">
        <label >Select book image</label>
        <input class="form-control" type="file" name="image" id="image">

        <button type="submit" class="btn btn-primary"> Create </button>
    </form>


@endsection
