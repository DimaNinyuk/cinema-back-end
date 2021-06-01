<?php

namespace App\Http\Controllers;

use App\Buying;
use Illuminate\Http\Request;
use App\Film;
use App\Hall;
use App\Session;
use DateTime;

class UserBuyingController extends Controller
{
   
    public function index()
    {

        return Buying::get();
    }
 
    public function show($user)
    {
        $dt = new DateTime();
        return Buying::with('buyingseats','buyingseats.seat.row',
        'buyingseats.seat.row.hall','buyingseats.seat.row.hall.type','session','session.film')
        ->whereHas('session', function($q) use($dt) {
            $q->where('date', '<',$dt->format('Y-m-d'));
        })
        ->where('user_id',$user)->get();
    }
    public function newshow($user)
    {
        $dt = new DateTime();
        return Buying::with('buyingseats','buyingseats.seat.row',
        'buyingseats.seat.row.hall','buyingseats.seat.row.hall.type','session','session.film')
        ->whereHas('session', function($q) use($dt) {
            $q->where('date', '>=',$dt->format('Y-m-d'));
        })
        ->where('user_id',$user)->get();
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
