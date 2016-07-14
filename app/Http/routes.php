<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'cardset', 'middleware' =>'auth'], function() {
  Route::get('/', 'CardsetController@index');
  Route::get('create', 'CardsetController@createPage');
  Route::post('create', 'CardsetController@create');
  Route::get('{cardset_id}', 'CardsetController@viewCardset');
  Route::get('edit/{cardset_id}', 'CardsetController@editPage');
  Route::post('edit', 'CardsetController@edit');
});

Route::group(['prefix' => 'cardcolor', 'middleware' =>'auth'], function() {
  Route::post('create/{cardset_id}', 'CardcolorController@createPage');
  Route::post('create-color', 'CardColorController@create');
});
