<?php

namespace App\Http\Controllers;

use App\Genre;
use App\GenreFilm;
use Illuminate\Http\Request;
use App\Film;
use App\Producer;

class AdminProducerController extends Controller
{
    public function index()
    {
        return Producer::all();
    }
}
