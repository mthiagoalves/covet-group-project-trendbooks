@extends('layouts.admin')

@section('title', 'TrendBook')

@section('content')

    <h1 class="title-admin">Admin Page</h1>

    <h3 class="title-admin">Hi, what do you want to do?</h3>

    <div class="directions">
        <a href="/books/create" class="btn btn-primary"> Create a Book </a>
        <p>or</p>
        <a href="/genre/create" class="btn btn-primary"> Create a Genre </a>
    </div>

    <h2 class="title-secations">All Books</h2>

    <div class="card-container-admin">
        @foreach ($books as $book)

            <div class="card admin" style="width: 18rem;">
                <img class="card-img-top" src="{{Storage::disk('public')->url($book->image)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">$ {{$book->price}}</p>
                    <div class="btn-btn">
                        <a href="/books/update/{{$book->id}}" class="btn btn-primary">Edit</a>
                        <form action="/books/delete/{{$book->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submits" class="btn btn-primary">Delete</button>
                        </form>
                    </div>


                </div>
            </div>

        @endforeach

    </div>

    <h2 class="title-secations">All Genres</h2>

    <div class="container-genres">

        @foreach($genres as $genre)

            <div class="card admin" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$genre->genre}}</h5>
                    <div class="btn-btn">
                        <a href="/genre/update/{{$genre->id}}" class="btn btn-primary">Edit</a>
                        <form action="/genre/delete/{{$genre->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submits" class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach

    </div>




@endsection
