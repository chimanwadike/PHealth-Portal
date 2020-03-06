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

    Route::prefix('profile')->group(function () {
        Route::get('/', 'Web\UserController@my_profile')->name('my_profile');
        Route::post('/picture/{user}', 'Web\UserController@change_photo')->name('change_photo');
        Route::get('/update', 'Web\UserController@show')->name('profile.edit');
        Route::put('/update', 'Web\UserController@update')->name('profile.update');
        Route::get('/{user}', 'Web\UserController@others_profile')->name('others_profile');
    });
});

Auth::routes();