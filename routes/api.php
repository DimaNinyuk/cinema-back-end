<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('auth/google/url', 'Api\Auth\GoogleController@loginUrl');
Route::get('auth/google/callback', 'Api\Auth\GoogleController@Callback');

Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/logout', 'UserController@logout');
Route::get('/films','FilmsController@today');
Route::get('/filmsbygenre/{date}','FilmsController@bygenre');
