<?php

use App\Buying;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/downloadPDF/{id}','BuyingPDFController@downloadPDF');
Route::get('/pdf/{id}', function ($id) {
    $buying = Buying::find($id);
    return view('pdf',compact('buying'));
});