@extends('layouts.admin')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page</h1>

    <h2 class="title-admin">Update a genre</h2>

    <form action="/genre/update/{{$genres->id}}" enctype="multipart/form-data" method="POST" class="label-input">
        @csrf
        @method('PUT')

        <label>Genre of the book</label>
        <input class="form-control" type="text" placeholder="Genre..." name="genre" id="genre" value="{{$genres->genre}}">

        <button type="submit" class="btn btn-primary"> Update </button>
    </form>


@endsection
