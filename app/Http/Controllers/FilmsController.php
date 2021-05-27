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


}
