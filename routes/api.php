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
//customer's film upload images
Route::post('/admin-upload-image-film','AdminImageController@upload');
// film sessions
Route::get('/film-sessions/{film}', 'SessionController@details');
// customer's film dates
Route::get('/film-dates/{film}', 'SessionController@filmDates');
//customer's film reviews
Route::get('/film-reviews/{film}', 'ReviewController@filmReviews');
//admin sessions
Route::get('/admin-sessions', 'AdminSessionController@index');
Route::get('/admin-sessions/{session}', 'AdminSessionController@show');
Route::post('/admin-sessions','AdminSessionController@store');
Route::put('/admin-sessions/{session}','AdminSessionController@update');
Route::delete('/admin-sessions/{session}', 'AdminSessionController@delete');
//admin halls
Route::get('/admin-halls', 'AdminHallController@index');
Route::get('/admin-halls/{hall}', 'AdminHallController@show');
Route::post('/admin-halls','AdminHallController@store');
Route::put('/admin-halls/{hall}','AdminHallController@update');
Route::delete('/admin-halls/{hall}', 'AdminHallController@delete');
// customer's adding film reviews
Route::post('/film-reviews', 'ReviewController@store');
//admin buyings
Route::get('/admin-buyings', 'AdminBuyingController@index');
Route::get('/admin-buyings/{buying}', 'AdminBuyingController@show');
Route::post('/admin-buyings','AdminBuyingController@store');
Route::put('/admin-buyings/{buying}','AdminBuyingController@update');
Route::delete('/admin-buyings/{buying}', 'AdminBuyingController@delete');
//admin reviews
Route::get('/admin-reviews', 'AdminReviewController@index');
Route::get('/admin-reviews/{review}', 'AdminReviewController@show');
Route::post('/admin-reviews','AdminReviewController@store');
Route::put('/admin-reviews/{review}','AdminReviewController@update');
Route::delete('/admin-reviews/{review}', 'AdminReviewController@delete');
//customer's film search
Route::get('/film-search', 'FilmsController@search');
//test
Route::get('/get-payment-string/{info}','PaymentController@format');
//download ticket
Route::get('/downloadPDF/{id}','BuyingPDFController@downloadPDF');
//user buyings
Route::get('/user-buyings', 'UserBuyingController@index');
Route::get('/user-buyings/{user}', 'UserBuyingController@show');
Route::get('/user-newbuyings/{user}', 'UserBuyingController@newshow');
Route::post('/user-buyings','UserBuyingController@store');
Route::put('/user-buyings/{buying}','UserBuyingController@update');
Route::delete('/user-buyings/{buying}', 'UserBuyingController@delete');
