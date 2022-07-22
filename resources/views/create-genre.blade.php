@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page</h1>

    <h2 class="title-admin">Create a genre</h2>

    <form action="/genre/create" enctype="multipart/form-data" method="POST" class="label-input">
        @csrf

        <label>Genre of the book</label>
        <input class="form-control" type="text" placeholder="Genre..." name="genre" id="genre">

        <button type="submit" class="btn btn-primary"> Create </button>
    </form>


@endsection
