<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show()
    {
        $books = Book::all();

        $genres = Genre::all();

        return view('welcome', compact('books', 'genres'));
    }

    public function admin()
    {
        $books = Book::all();

        $genres = Genre::all();

        return view('admin', compact('books', 'genres'));
    }

    public function create()
    {
        return view('create-book');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,bmp,png'
        ]);

        $file = $input['image'];
        $path = $file->store('images', 'public');
        $input['image'] = $path;

        Book::create($input);

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
        $books->price = request('price');
        $books->image = request('image');
        $books->save();

        return redirect('admin')->with('msg', 'Book updated sucess');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect('/admin')->with('msg', 'Book deleted sucess');
    }
}
