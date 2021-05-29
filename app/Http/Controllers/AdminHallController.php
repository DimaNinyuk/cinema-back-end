<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Hall;
use App\Session;

class AdminHallController extends Controller
{
   
    public function index()
    {

        return Hall::with('rows','sessions','type')->get();
    }
 
    public function show(Hall $hall)
    {
        return Hall::where('id',$hall->id)->with('rows','sessions','type')->first();
    }
 
    public function store(Request $request)
    {
        $hall = Hall::create($request->all());
 
        return response()->json($hall, 201);
    }
 
    public function update(Request $request, Hall $hall)
    {
        $hall->update($request->all());
        return response()->json($hall, 200);
    }
 
    public function delete(Hall $hall)
    {
        $hall->delete();
        return response()->json(null, 204);
    }
}
