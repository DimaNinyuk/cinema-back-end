<?php

namespace App\Http\Controllers;

use App\Buying;
use Illuminate\Http\Request;
use App\Film;
use App\Session;

class AdminBuyingController extends Controller
{
   
    public function index()
    {

        return Buying::with('buyingseats','buyingseats.seat.row','buyingseats.seat.row.hall')->get();
    }
 
    public function show(Buying $buying)
    {
        return Buying::where('id',$buying->id)->with('buyingseats','buyingseats.seat.row','buyingseats.seat.row.hall')->first();
    }
 
    public function store(Request $request)
    {
        $buying = Buying::create($request->all());
 
        return response()->json($buying, 201);
    }
 
    public function update(Request $request, Buying $buying)
    {
        $buying->update($request->all());
        return response()->json($buying, 200);
    }
 
    public function delete(Buying $buying)
    {
        $buying->delete();
        return response()->json(null, 204);
    }
}
