<?php

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
    if(auth()->user()){
        return redirect()->route('home');
    }else{
        return view('auth.login');
    }
})->name("base");

Route::middleware('auth')->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/users', 'Web\UserController');
    Route::resource('/facilities', 'Web\FacilityController');
    Route::resource('/clients', 'Web\ClientController');
    Route::get('/clients-by-facility', 'Web\ClientController@clients_by_facility')->name("clients.facilities");
    Route::get('/clients-by-facility/{facility}', 'Web\ClientController@clients_by_facility_show')->name("clients.facilities.show");
    Route::get('/clients-by-refered-facility', 'Web\ClientController@clients_by_refered_facility')->name("clients.refered_facilities");
    Route::get('/clients-by-refered-facility/{facility}', 'Web\ClientController@clients_by_refered_facility_show')->name("clients.refered_facilities.show");
    Route::get('/clients-by-user', 'Web\ClientController@clients_by_user')->name("clients.users");
    Route::get('/clients-by-user/{user}', 'Web\ClientController@clients_by_user_show')->name("clients.users.show");
    Route::get('/clients-by-state', 'Web\ClientController@clients_by_state')->name("clients.states");
    Route::get('/clients-by-state/{state}', 'Web\ClientController@clients_by_state_show')->name("clients.states.show");
    Route::get('/clients-by-lga', 'Web\ClientController@clients_by_lga')->name("clients.lgas");
    Route::get('/clients-by-lga/{lga}', 'Web\ClientController@clients_by_lga_show')->name("clients.lgas.show");

    Route::prefix('profile')->group(function () {
        Route::get('/', 'Web\UserController@my_profile')->name('my_profile');
        Route::post('/picture/{user}', 'Web\UserController@change_photo')->name('change_photo');
        Route::get('/update', 'Web\UserController@show')->name('profile.edit');
        Route::put('/update', 'Web\UserController@update')->name('profile.update');
        Route::get('/{user}', 'Web\UserController@others_profile')->name('others_profile');
    });

    Route::prefix('ajax')->group(function () {
        Route::post('/lga', 'Web\AjaxResourceController@getLga')->name('ajax.lga');
    });
});

Auth::routes();