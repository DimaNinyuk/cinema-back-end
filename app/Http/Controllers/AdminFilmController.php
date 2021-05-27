<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;
use App\GenreFilm;
use App\Actor;
use App\ActorFilm;
use App\ProducerFilm;

class AdminFilmController extends Controller
{
    public function deleteGenreFilms(Film $film){
        return GenreFilm::where('film_id',$film->id)->delete();
        
    }
    public function deleteActorFilms(Film $film){
        return ActorFilm::where('film_id',$film->id)->delete();
    }
    public function deleteProducerFilms(Film $film){
        return ProducerFilm::where('film_id',$film->id)->delete();
    }
    public function index()
    {

        return Film::with('genrefilms','actorfilms','producerfilms')->get();
    }
 
    public function show(Film $film)
    {
        return Film::where('id',$film->id)->with('genrefilms','actorfilms','producerfilms')->first();
    }
 
    public function store(Request $request)
    {
        $film = Film::create($request->all());
 
        return response()->json($film, 201);
    }
 
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
        $this->deleteGenreFilms($film);
        $this->deleteActorFilms($film);
        $this->deleteProducerFilms($film);
        return response()->json($film, 200);
    }
 
    public function delete(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
}
