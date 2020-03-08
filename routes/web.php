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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth','prefix' => 'ingredients'], function () {
    Route::get('/', 'IngredientController@index')->name('ingredients.index');
    Route::get('/list','IngredientController@list')->name('ingredients.list');
    Route::get('/create', 'IngredientController@create')->name('ingredients.create');
    Route::post('/', 'IngredientController@store')->name('ingredients.store');
    Route::get('/{id}/edit', 'IngredientController@edit')->name('ingredients.edit');
    Route::put('/update/{id}','IngredientController@update')->name('ingredients.update');
    Route::get('/{id}','IngredientController@show')->name('ingredients.show');
});

