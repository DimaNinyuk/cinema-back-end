<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Session;

class AdminSessionController extends Controller
{
   
    public function index()
    {

        return Session::with('buyings','hall','film')->get();
    }
 
    public function show(Session $session)
    {
        return Session::where('id',$session->id)->with('buyings','hall','film')->first();
    }
 
    public function store(Request $request)
    {
        $session = Session::create($request->all());
 
        return response()->json($session, 201);
    }
 
    public function update(Request $request, Session $session)
    {
        $session->update($request->all());
        return response()->json($session, 200);
    }
 
    public function delete(Session $session)
    {
        $session->delete();
        return response()->json(null, 204);
    }
}
