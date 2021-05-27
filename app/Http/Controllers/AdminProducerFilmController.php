<?php

namespace App\Http\Controllers;

use App\ActorFilm;
use Illuminate\Http\Request;
use App\Film;
use App\ProducerFilm;

class AdminProducerFilmController extends Controller
{
  public function insert(Request $request)
  {
    $data = count($request->all());
    for ($i = 0; $i < (int)$data; $i++) {
      ProducerFilm::create([
        'film_id' => (int)($request[$i]['film_id']),
        'producer_id' => (int)($request[$i]['producer_id']),
      ]);
    }
    return response()->json($data, 201);
  }
}
