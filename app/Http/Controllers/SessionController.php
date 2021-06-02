<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Session;
use DateTime;

class SessionController extends Controller
{
    function details (Film $film){
        $dt = new DateTime();
        return Session::with('film','hall','hall.type', 'hall.rows', 
        'hall.rows.seats','buyings', 'buyings.buyingseats')->where('film_id', $film->id)
        ->where('date','>=',$dt->format('Y-m-d'))->get();
    }
    function filmDates (Film $film){
        $dt = new DateTime();
        return Session::where('film_id',$film->id)->where(
            'date','>=',$dt->format('Y-m-d'))->select('date')->distinct()->get();;
    }
}
