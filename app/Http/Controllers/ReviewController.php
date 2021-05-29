<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Review;

class ReviewController extends Controller
{
    function filmReviews (Film $film){
        return Review::where('film_id', $film->id)->get();
    }
}
