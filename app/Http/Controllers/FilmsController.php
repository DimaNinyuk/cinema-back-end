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
                $s->where('date','=',$dt->format('Y-m-d'));
            })->orderBy('name', 'ASC')->with('genrefilms','image','genrefilms.genre')->get();
    }

    public function newfilms()
    {
        $dt = new DateTime();
        return
            Film::where('release_date','>=',$dt->format('Y-m-d'))
            ->orderBy('release_date', 'ASC')->with('genrefilms','image')->get();
    }
    public function bygenre($date)
    {
        $g = Genre::whereHas('genrefilms.film', function($q) use($date){
            $q->where('release_date',$date);
        })->with('genrefilms','genrefilms.film.genrefilms.genre',)->get();
        return $g;

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
