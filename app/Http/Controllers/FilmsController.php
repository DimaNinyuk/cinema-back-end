<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;
use DateTime;

class FilmsController extends Controller
{
    public function recommends()
    {
        $dt = new DateTime();
        return
            Film::whereHas('sessions', function($s) use($dt){
                $s->where('date','>=',$dt->format('Y-m-d'));
            })->where('release_date',"<=",$dt)->orderBy('name', 'ASC')->with('genrefilms','image','genrefilms.genre')->get();
    }

    public function newfilms()
    {
        $dt = new DateTime();
        
         $rows = Film::where('release_date','>=',$dt->format('Y-m-d'))
            ->orderBy('release_date', 'ASC')->with('genrefilms','image')->get();
            return  $rows->count()>10?$rows->random(10):$rows;
    }
    public function bygenre($date)
    {
        $fg= Genre::with(array('genrefilms' =>  function($q) use($date){
            $q->has('film.sessions')->with(array('film.sessions'=> function($s) use($date){
                $s->where('date','>=',$date);}));
        }))->get();
       
        /*join('genre_films', 'genres.id', '=', 'genre_id')->
        join('films','genre_films.film_id', '=', 'films.id')->
        join('sessions','films.id', '=', 'sessions.film_id')->get();
        */
        /*with(array('genrefilms.film.sessions' =>  function($q) use($date){
            $q->where('date',$date);
        }
            ))->has('genrefilms.film.sessions')->get();
            */
        return $fg;

    }

    public function details(Film $film)
    {
        return
            Film::where('id', $film->id)->with('genrefilms','genrefilms.genre',
            'actorfilms','actorfilms.actor', 'producerfilms', 'producerfilms.producer',
            'company','image')->first();
    }

    public function search()
    {
        return Film::with('genrefilms','genrefilms.genre',
        'actorfilms','actorfilms.actor', 'producerfilms', 'producerfilms.producer',
        'company')->where('name', 'LIKE', '%'.$_GET['key'].'%')
        ->orWhere('description', 'LIKE', '%'.$_GET['key'].'%')
        ->orWhere('release_date', 'LIKE', '%'.$_GET['key'].'%')
        ->orWhereHas('genrefilms.genre', function($q) {
            $q->where('name', 'LIKE', '%'.$_GET['key'].'%');
        })
            ->orWhereHas('actorfilms.actor', function($q) {
                $q->where('name', 'LIKE', '%'.$_GET['key'].'%');
        })
         ->orWhereHas('producerfilms.producer', function($q) {
                $q->where('name', 'LIKE', '%'.$_GET['key'].'%');
        })
        ->orWhereHas('company', function($q) {
            $q->where('name', 'LIKE', '%'.$_GET['key'].'%');
    })
        ->get();
    }

}
