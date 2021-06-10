<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buying;

class BuyingController extends Controller
{
    function show($id){
        return Buying::where('id', '=', $id)->with('buyingseats', 'session',
        'buyingseats.seat', 'buyingseats.seat.row','session.film',
        'buyingseats.seat.row.hall', 'buyingseats.seat.row.hall.type')->first();
    }
}
