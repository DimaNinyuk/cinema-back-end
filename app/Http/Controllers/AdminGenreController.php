<?php

namespace App\Http\Controllers;

use App\Genre;
use App\GenreFilm;
use Illuminate\Http\Request;
use App\Film;

class AdminGenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }
    public function insert(Request $request)
    {
        $genre = Genre::create($request->all());
 
        return response()->json($genre, 201);
    }
    public function delete(Genre $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
    public function show(Film $film)
    {
        return GenreFilm::where('film_id',$film->id)->get();
    }
}
