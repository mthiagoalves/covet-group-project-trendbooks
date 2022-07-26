@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

<div class="sidebar-container">
    <div class="grid-sidebar">
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Popular Subjects</h3>
                    @foreach($genres as $genre)
                        <a class="genre-title">{{$genre->genre}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Fiction</h3>
                    @foreach($genres as $genre)
                        <a class="genre-title">{{$genre->genre}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Non-Fiction</h3>
                    @foreach($genres as $genre)
                        <a class="genre-title">{{$genre->genre}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="colunm-text">
        <div class="text-select">
            <a href="#">My wishlist</a>
        </div>
        @if($wishlist != null)
            @foreach($wishlist as $book)
                <div class="card-container">
                    <div class="card">
                    <div class="row g-0">
                        <div class="col-sm-5">
                            <img src="{{Storage::disk('public')->url($book->image)}}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title"> {{$book->title}} </h5>
                                <p class="card-text">Genre</p>
                                <p class="classification"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                                <p class="card-text">${{$book->price}}</p>
                                <div class="product-wish">
                                    <button href="#" class="btn btn-primary"> Add to cart </button>
                                    <form action="/books/leave/{{$book->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/books/leave/{{$book->id}}" onclick="books.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="fa-solid fa-heart"></i> Remove</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nothing is here</p>
        @endif

    </div>
</div>



@endsection
