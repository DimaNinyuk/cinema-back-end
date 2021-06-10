<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuyingSeat;
class BuyingSeatController extends Controller
{
    function show($id){
        return BuyingSeat::with('buying')->WhereHas('buying', function($q) use($id){
            $q->where('session_id', '=', $id);
        })->get();
    }
}
