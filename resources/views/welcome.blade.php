@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                                    <a href="#"><i class="fa-solid fa-heart"></i></i></a>
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
