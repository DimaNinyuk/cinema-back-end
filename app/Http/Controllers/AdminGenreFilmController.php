<?php

namespace App\Http\Controllers;

use App\GenreFilm;
use Illuminate\Http\Request;
use App\Film;

class AdminGenreFilmController extends Controller
{
    public function insert(Request $request)
    {
      //  $genre = Genre::create($request->all());
      
      $data=count($request->all());
      for($i=0;$i<(int)$data;$i++)
      {
        GenreFilm::create([
          'film_id'=>(int)($request[$i]['film_id']),
          'genre_id'=>(int)($request[$i]['genre_id']),
        ]);
      }
        return response()->json($data, 201);
    }


}
