@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')

<div class="sidebar-container" id="sidebar-container">
    <div class="grid-sidebar">
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Popular Subjects</h3>
                    <input type="submit" name="search" value="{{$genres[0]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[1]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[2]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[3]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[4]->genre}}" id="search" />
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Fiction</h3>
                    <input type="submit" name="search" value="{{$genres[5]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[6]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[7]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[8]->genre}}" id="search" />
                </div>
            </div>
        </div>
        <div class="genres-container">
            <div class="items-genre">
                <div class="items-sub-genre">
                    <h3>Non-Fiction</h3>
                    <input type="submit" name="search" value="{{$genres[9]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[10]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[11]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[12]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[13]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[14]->genre}}" id="search" />
                    <input type="submit" name="search" value="{{$genres[15]->genre}}" id="search" />
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
            <div class="card-size">
                <div class="card-size-all">
                    <div class="card-b">
                        <div class="card-img">
                            <img src="{{Storage::disk('public')->url($book->image)}}" id="img-card" alt="...">
                        </div>
                        <div class="card-home">
                            <div class="card-head">
                                <h5 class="card-title"> {{$book->title}} </h5>
                                <p class="card-text">Genre</p>
                                <p class="classification"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                                <p class="card-price">${{$book->price}}</p>
                                <div class="product-wish">
                                    <button href="#" class="btn-cart"> Add to cart </button>
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
            </div>

            @endforeach
        </div>
    </div>
</div>



@endsection
