<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show()
    {
        $genres = Genres::all();

        return view('welcome', compact('genres'));
    }

    public function create()
    {
        return view('create-genre');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'genre' => 'required|string'
        ]);

        Genres::create($input);

        return redirect('admin')->with('msg', 'Genre created sucess');
    }

    public function edit($id)
    {
        $genres = Genres::find($id);

        return view('update-genre', compact('genres'));
    }

    public function update($id)
    {
        $genres = Genres::find($id);

        $genres->genre = request('genre');
        $genres->save();

        return redirect('admin')->with('msg', 'Genre updated sucess');
    }

    public function destroy($id)
    {
        Genres::find($id)->delete();

        return redirect('/admin')->with('msg', 'Genre deleted sucess');
    }
}
