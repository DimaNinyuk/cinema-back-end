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
Route::get('/recommends','FilmsController@recommends');
Route::get('/filmsbygenre/{date}','FilmsController@bygenre');
//admin
//film
Route::get('/admin-films', 'AdminFilmController@index');
Route::get('/admin-films/{film}', 'AdminFilmController@show');
Route::post('/admin-films','AdminFilmController@store');
Route::put('/admin-films/{film}','AdminFilmController@update');
Route::delete('/admin-films/{film}', 'AdminFilmController@delete');
//genres
Route::get('/admin-genres', 'AdminGenreController@index');
//genresfilm
Route::post('/admin-genrefilm','AdminGenreFilmController@insert');
//acotrs
Route::get('/admin-actors', 'AdminActorController@index');
//actorfilms
Route::post('/admin-actorfilm','AdminActorFilmController@insert');
//producer
Route::get('/admin-producers', 'AdminProducerController@index');
//producerfilms
Route::post('/admin-producerfilm','AdminProducerFilmController@insert');
//companies
Route::get('/admin-companies', 'AdminCompanyController@index');
//customer's film information
Route::get('/film-detail/{film}', 'FilmsController@details');
//film upload images
Route::post('/admin-upload-image-film','AdminImageController@upload');
// film sessions
Route::get('/film-sessions/{film}', 'SessionController@details');
// film dates
Route::get('/film-dates/{film}', 'SessionController@filmDates');
// film reviews
Route::get('/film-reviews/{film}', 'ReviewController@filmReviews');
