<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Genre;
use App\ActorFilm;
use Illuminate\Http\Request;
use App\Film;

class AdminActorController extends Controller
{
    public function index()
    {
        return Actor::all();
    }
}
