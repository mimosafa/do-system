<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create()
    {
        return view('admin/genres/index', [
            'genres' => Genre::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:genres|max:10',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect()->back()->with('success_message', '「' . $genre->name . '」が追加されました');
    }
}
