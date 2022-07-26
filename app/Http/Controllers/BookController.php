<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{

    public function show()
    {
        $books = Book::all();

        $genres = Genre::all();

        return view('welcome', compact('books', 'genres'));
    }

    public function showWishlist()
    {
        $genres = Genre::all();

        $user = Auth::user();

        $wishlist = $user->wishlistBooks;

        return view('wishlist', compact('wishlist', 'genres'));
    }

    public function admin()
    {
        $books = Book::all();

        $genres = Genre::all();

        return view('admin', compact('books', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('create-book', compact('genres'));
    }

    public function store(Request $request)
    {
        // $book = $request->validate([
        //     'title' => 'required|string',
        //     'author' => 'required|string',
        //     'description' => 'required|string',
        //     'price' => 'required|integer',
        //     'image' => 'required|image|max:10000',
        //     'genre_id'
        // ]);



        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->image = $request->image;
        $book->genre_id = $request->genre_id;

        $this->validateBooks($book);

        $file = $book['image'];
        $path = $file->store('images', 'public');
        $book['image'] = $path;

        $book->save();

        return redirect('admin')->with('msg', 'Book created sucess');
    }

    public function edit($id)
    {
        $books = Book::find($id);

        return view('update-book', compact('books'));
    }

    public function update($id)
    {
        $books = Book::find($id);

        $books->title = request('title');
        $books->author = request('author');
        $books->description = request('description');
        $books->price = request('price');
        $books->image = request('image');

        $file = $books['image'];
        $path = $file->store('images', 'public');
        $books['image'] = $path;

        $books->save();

        return redirect('admin')->with('msg', 'Book updated sucess');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect('/admin')->with('msg', 'Book deleted sucess');
    }

    public function wishlist($id)
    {
        $user = Auth::user();

        $user->wishlistBooks()->attach($id);

        return redirect('wishlist')->with('msg', 'wishlist added');
    }

    public function leaveWishlist($id)
    {
        $user = Auth::user();

        $user->wishlistBooks()->detach($id);

        $books = Book::findOrFail($id);

        return redirect('wishlist')->with('msg', 'removed book for your wishlist');
    }

    public function validateBooks()
    {
        return request()->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|max:10000',
            'genre_id' => 'required'
        ]);
    }
}
