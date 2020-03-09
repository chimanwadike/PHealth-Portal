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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Api\LoginController@login')->name('api.login');
Route::post('/facilities', 'Api\FacilityController@facilities')->name('api.facilites');
Route::post('/states', 'Api\StateController@states')->name('api.states');
Route::post('/lgas', 'Api\LgaController@lgas')->name('api.lgas');
Route::post('/state_lgas/{state}', 'Api\LgaController@states_lga')->name('api.states_lga');
Route::post('/client/store', 'Api\ClientController@client_store')->name('api.client_store');
Route::post('/client/store_bulk', 'Api\ClientController@client_store_bulk')->name('api.client_store_bulk');
