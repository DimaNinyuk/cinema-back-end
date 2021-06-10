<?php

namespace App\Http\Controllers;

use App\ActorFilm;
use Illuminate\Http\Request;
use App\Film;

class AdminActorFilmController extends Controller
{
  public function insert(Request $request)
    {
      $data=count($request->all());
      for($i=0;$i<(int)$data;$i++)
      {
        ActorFilm::create([
          'film_id'=>(int)($request[$i]['film_id']),
          'actor_id'=>(int)($request[$i]['actor_id']),
        ]);
      }
        return response()->json($data, 201);
    }
}
