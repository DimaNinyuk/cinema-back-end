<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;
use App\GenreFilm;
use App\Actor;
use App\ActorFilm;

class AdminFilmController extends Controller
{
    public function index()
    {

        return Film::with('genrefilms','actorfilms','actorfilms.actor')->get();
    }
 
    public function show(Film $film)
    {
        return $film;
    }
 
    public function store(Request $request)
    {
        $film = Film::create($request->all());
 
        return response()->json($film, 201);
    }
 
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
 
        return response()->json($film, 200);
    }
 
    public function delete(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
}
