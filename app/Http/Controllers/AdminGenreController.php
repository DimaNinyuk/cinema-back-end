<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Film;

class AdminGenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }
    public function insert(Request $request)
    {
        $genre = Genre::create($request->all());
 
        return response()->json($genre, 201);
    }
    public function delete(Film $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
    
}
