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

    public function bygenre()
    {
        return
            Genre::with('genrefilms', 'genrefilms.film')->get();

    }


}
