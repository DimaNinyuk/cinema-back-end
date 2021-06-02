<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
        $genres=Genre::with('genrefilms.film.sessions')->get()->toArray();
        $newgenres=collect();
        foreach($genres as $genre){
            $newgenre=  $genre;
            
            $newgenre['genrefilms']=collect();
            foreach($genre['genrefilms'] as $genrefilm)
            {
                $newgenrefilm= $genrefilm;
                $newgenrefilm['film']['sessions']=collect();
               foreach($genrefilm['film']['sessions'] as $session){
                  if($session['date']==$date){
                    $newgenrefilm['film']['sessions']->add($session);}
               }
                if($newgenrefilm['film']['sessions']->count()>0 
                && !$newgenre['genrefilms']->contains('film_id', $newgenrefilm['film_id']))
                $newgenre['genrefilms']->add($newgenrefilm);
            }
                if($newgenre['genrefilms']  ->count()>0)
            $newgenres->add($newgenre);
        }
       
        /*join('genre_films', 'genres.id', '=', 'genre_id')->
        join('films','genre_films.film_id', '=', 'films.id')->
        join('sessions','films.id', '=', 'sessions.film_id')->get();
        */
        /*with(array('genrefilms.film.sessions' =>  function($q) use($date){
            $q->where('date',$date);
        }
            ))->has('genrefilms.film.sessions')->get();
            */
        return $newgenres;

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
