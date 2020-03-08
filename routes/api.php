<?php

use Illuminate\Http\Request;

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
Route::get('clients', 'ApiController@getAllClients');
Route::get('clients/{id}', 'ApiController@getClient');
Route::post('clients', 'ApiController@createClient');
Route::put('clients/{id}', 'ApiController@updateClient');
Route::delete('clients/{id}','ApiController@deleteClient');

Route::post('travels', 'ApiController@createTravel');
Route::get('travels', 'ApiController@getAllTravels');
Route::get('travels/{mail}', 'ApiController@getTravelsByEmail');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
