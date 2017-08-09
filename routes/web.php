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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
//Route::get('/create', function () {
//    return view('create');
//});

Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'check if logged in']], function () {
    Route::get('/', function () {
        return view('admin.welcome_admin');
    });

    Route::group(['prefix' => 'airlines'], function () {
        Route::get('/', ['as' => 'app.airlines.index', 'uses' => 'FLYAirlinesController@index']);
      /*  Route::group(['prefix' => '{id}'], function () {*/
            Route::get('/create', ['as' => 'app.airlines.create', 'uses' => 'FLYAirlinesController@create']);
            Route::post('/create', ['as' => 'app.airlines.store', 'uses' => 'FLYAirlinesController@store']);
            Route::get('/edit', ['as' => 'app.airlines.edit', 'uses' => 'FLYAirlinesController@edit']);
            Route::post('/edit', ['as' => 'app.airlines.update', 'uses' => 'FLYAirlinesController@update']);
//            Route::get('/', ['as' => 'app.airlines.show', 'uses' => 'FLYAirlinesController@show']);
            Route::delete('/', ['as' => 'app.airlines.delete', 'uses' => 'FLYAirlinesController@destroy']);
//        });
    });



    Route::group(['prefix' => 'airports'], function () {
        Route::get('/', ['as' => 'app.airports.index', 'uses' => 'FLYAirportsController@index']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/create', ['as' => 'app.airports.create', 'uses' => 'FLYAirportsController@create']);
            Route::post('/create', ['as' => 'app.airports.store', 'uses' => 'FLYAirportsController@store']);
            Route::get('/edit', ['as' => 'app.airports.edit', 'uses' => 'FLYAirportsController@edit']);
            Route::post('/edit', ['as' => 'app.airports.update', 'uses' => 'FLYAirportsController@update']);
            Route::get('/', ['as' => 'app.airports.show', 'uses' => 'FLYAirportsController@show']);
            Route::delete('/', ['as' => 'app.airports.delete', 'uses' => 'FLYAirportsController@destroy']);
        });
    });



    Route::group(['prefix' => 'flights'], function () {
        Route::get('/', ['as' => 'app.flights.index', 'uses' => 'FLYFlightsController@index']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/create', ['as' => 'app.flights.create', 'uses' => 'FLYFlightsController@create']);
            Route::post('/create', ['as' => 'app.flights.store', 'uses' => 'FLYFlightsController@store']);
            Route::get('/edit', ['as' => 'app.flights.edit', 'uses' => 'FLYFlightsController@edit']);
            Route::post('/edit', ['as' => 'app.flights.update', 'uses' => 'FLYFlightsController@update']);
            Route::get('/', ['as' => 'app.flights.show', 'uses' => 'FLYFlightsController@show']);
            Route::delete('/', ['as' => 'app.flights.delete', 'uses' => 'FLYFlightsController@destroy']);
        });
    });


    Route::group(['prefix' => 'countries'], function () {
        Route::get('/', ['as' => 'app.countries.index', 'uses' => 'FLYCountriesController@index']);



});

});