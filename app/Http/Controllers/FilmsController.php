<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;

class FilmsController extends Controller
{
    public function today()
    {
        return
            Film::with('genrefilms')->get();

            //
    }

    public function bygenre($date)
    {
        $g = Genre::whereHas('genrefilms.film', function($q) use($date){
            $q->where('release_date',$date);
        })->with('genrefilms','genrefilms.film')->get();
        return $g;

    }


}
