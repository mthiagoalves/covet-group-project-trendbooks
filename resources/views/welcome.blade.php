@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

<div class="sidebar-container">
    <div class="grid-sidebar">
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Popular Subjects</h3>
                    <a class="genre-title">{{$genres[0]->genre}}</a>
                    <a class="genre-title">{{$genres[1]->genre}}</a>
                    <a class="genre-title">{{$genres[2]->genre}}</a>
                    <a class="genre-title">{{$genres[3]->genre}}</a>
                    <a class="genre-title">{{$genres[4]->genre}}</a>
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Fiction</h3>
                    <a class="genre-title">{{$genres[5]->genre}}</a>
                    <a class="genre-title">{{$genres[6]->genre}}</a>
                    <a class="genre-title">{{$genres[7]->genre}}</a>
                    <a class="genre-title">{{$genres[8]->genre}}</a>
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Non-Fiction</h3>
                    <a class="genre-title">{{$genres[9]->genre}}</a>
                    <a class="genre-title">{{$genres[10]->genre}}</a>
                    <a class="genre-title">{{$genres[11]->genre}}</a>
                    <a class="genre-title">{{$genres[12]->genre}}</a>
                    <a class="genre-title">{{$genres[13]->genre}}</a>
                    <a class="genre-title">{{$genres[14]->genre}}</a>
                    <a class="genre-title">{{$genres[15]->genre}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="colunm-text">
        <div class="text-select">
            <a href="#">For You</a>
            <a href="#">New Releases</a>
        </div>
        <div class="card-container">
            @foreach ($books as $book)

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
                                    <form action="/books/wishlist/{{$book->id}}" method="POST">
                                        @csrf
                                        <a href="/books/wishlist/{{$book->id}}" onclick="books.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="fa-solid fa-heart"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
