<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class FilmsController extends Controller
{
    public function today()
    {
        return Film::all();
    }
}
