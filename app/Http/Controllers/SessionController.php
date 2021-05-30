<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Session;

class SessionController extends Controller
{
    function details (Film $film){
        return Session::with('film','hall','hall.type', 'hall.rows', 'hall.rows.seats','buyings', 'buyings.buyingseats')->where('film_id', $film->id)->get();
    }
    function filmDates (Film $film){
        return Session::where('film_id',$film->id)->select('date')->distinct()->get();;
    }
}
