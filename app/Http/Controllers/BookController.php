<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Genres;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show()
    {
        $books = Books::all();

        return view('welcome', compact('books'));
    }

    public function admin()
    {
        $books = Books::all();

        $genres = Genres::all();

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
            'price' => 'required|integer',
            'image' => 'required|mimes:jpg,bmp,png'
        ]);

        $file = $input['image'];
        $path = $file->store('images', 'public');
        $input['image'] = $path;

        Books::create($input);

        return redirect('admin')->with('msg', 'Book created sucess');
    }

    public function edit($id)
    {
        $books = Books::find($id);

        return view('update-book', compact('books'));
    }

    public function update($id)
    {
        $books = Books::find($id);

        $books->title = request('title');
        $books->price = request('price');
        $books->image = request('image');
        $books->save();

        return redirect('admin')->with('msg' . 'Book updated sucess');
    }

    public function destroy($id)
    {
        Books::find($id)->delete();

        return redirect('/admin')->with('msg', 'Book deleted sucess');
    }
}
