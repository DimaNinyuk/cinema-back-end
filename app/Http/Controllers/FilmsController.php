<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;

class FilmsController extends Controller
{
    public function recommends()
    {
        return
            Film::with('genrefilms')->get();
    }

    public function bygenre($date)
    {
        $g = Genre::whereHas('genrefilms.film', function($q) use($date){
            $q->where('release_date',$date);
        })->with('genrefilms','genrefilms.film')->get();
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
