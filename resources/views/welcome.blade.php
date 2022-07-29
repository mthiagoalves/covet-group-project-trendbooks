@extends('layouts.main')

@section('title', 'TrendBook')

@section('content')
    <div class="toggle">
        <p id="myMenu" onclick="toggleMenu(), retateButtom()">&#xBB;</p>
    </div>
    <div class="sidebar-container" id="sidebar-container">

        <div class="grid-sidebar">
            <div class="genres-container">
                <div class="items-genre">
                    <div class="items-sub-genre" id="genreContainer">
                        <h3>Popular Subjects <button class="btn active"
                                onclick="filterSelection('all'), toggleMenu()"></button></h3>
                        <input type="submit" onclick="filterSelection('{{ $genres[0]->id }}'), toggleMenu()"
                            value="{{ $genres[0]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[1]->id }}'), toggleMenu()"
                            value="{{ $genres[1]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[2]->id }}'), toggleMenu()"
                            value="{{ $genres[2]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[3]->id }}'), toggleMenu()"
                            value="{{ $genres[3]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[4]->id }}'), toggleMenu()"
                            value="{{ $genres[4]->genre }}" id="search" />
                    </div>
                </div>
            </div>
            <div class="genres-container">
                <div class="items-genre">
                    <div class="items-sub-genre">
                        <h3>Fiction</h3>
                        <input type="submit" onclick="filterSelection('{{ $genres[5]->id }}'), toggleMenu()"
                            value="{{ $genres[5]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[6]->id }}'), toggleMenu()"
                            value="{{ $genres[6]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[7]->id }}'), toggleMenu()"
                            value="{{ $genres[7]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[8]->id }}'), toggleMenu()"
                            value="{{ $genres[8]->genre }}" id="search" />
                    </div>
                </div>
            </div>
            <div class="genres-container">
                <div class="items-genre">
                    <div class="items-sub-genre">
                        <h3>Non-Fiction</h3>
                        <input type="submit" onclick="filterSelection('{{ $genres[9]->id }}'), toggleMenu()"
                            value="{{ $genres[9]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[10]->id }}'), toggleMenu()"
                            value="{{ $genres[10]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[11]->id }}'), toggleMenu()"
                            value="{{ $genres[11]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[12]->id }}'), toggleMenu()"
                            value="{{ $genres[12]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[13]->id }}'), toggleMenu()"
                            value="{{ $genres[13]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[14]->id }}'), toggleMenu()"
                            value="{{ $genres[14]->genre }}" id="search" />
                        <input type="submit" onclick="filterSelection('{{ $genres[15]->id }}'), toggleMenu()"
                            value="{{ $genres[15]->genre }}" id="search" />
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
                @foreach ($dolarBook as $book)
                    <div class="card-size filterDiv {{ $book->genre_id }}">
                        <div class="card-size-all">
                            <div class="card-b">
                                <div class="card-img">
                                    <img src="{{ Storage::disk('public')->url($book->image) }}" id="img-card"
                                        alt="...">
                                </div>
                                <div class="card-home">
                                    <div class="card-head">
                                        <h5 class="card-title"> {{ $book->title }} </h5>
                                        <p class="card-text">{{$book->genre->genre}}</p>
                                        <p class="classification"><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                                        <p class="card-price">${{ $book->price }}</p>
                                    </div>
                                    <div class="product-wish">
                                        <button href="#" class="btn-cart"> Add to cart </button>
                                        <form action="/books/wishlist/{{ $book->id }}" method="POST"
                                            id="wishlist">
                                            @csrf
                                            <a href="/books/wishlist/{{ $book->id }}"
                                                onclick="books.preventDefault();
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
