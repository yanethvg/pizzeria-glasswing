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

Route::get('/home', 'HomeController@index')->name('home')->middleware('verificacion');

//Ingredientes
Route::group(['middleware'=>'auth','prefix' => 'ingredients','middleware'=>'has.role:admin'], function () {
    Route::get('/', 'IngredientController@index')->name('ingredients.index');
    Route::get('/list','IngredientController@list')->name('ingredients.list');
    Route::get('/create', 'IngredientController@create')->name('ingredients.create');
    Route::post('/', 'IngredientController@store')->name('ingredients.store');
    Route::get('/{id}/edit', 'IngredientController@edit')->name('ingredients.edit');
    Route::put('/update/{id}','IngredientController@update')->name('ingredients.update');
    Route::get('/{id}','IngredientController@show')->name('ingredients.show');
    Route::post('/file','IngredientController@import')->name('import.ingredients');
    Route::get('/download','IngredientController@export')->name('export.ingredients');
});

Route::group(['middleware'=>'auth','prefix' => 'pizzas','middleware'=>'has.role:admin'], function () {
    Route::get('/', 'PizzaController@index')->name('pizzas.index');
    Route::get('/list','PizzaController@list')->name('pizzas.list');
    Route::get('/create', 'PizzaController@create')->name('pizzas.create');
    Route::post('/', 'PizzaController@store')->name('pizzas.store');
    Route::get('/{id}/edit', 'PizzaController@edit')->name('pizzas.edit');
    Route::put('/update/{id}','PizzaController@update')->name('pizzas.update');
    Route::get('/{id}','PizzaController@show')->name('pizzas.show');
});

Route::group(['middleware'=>'auth','prefix' => 'consultas','middleware'=>'has.role:admin'], function () {
    Route::get('/queryFrecuents', 'QueryController@clientesFrecuentes')->name('query.clientsFrecuent');
    Route::get('/querySpend', 'QueryController@clientesGastan')->name('query.clientspend');
    Route::get('/queryIngredients', 'QueryController@ingredientesPopulares')->name('query.ingredientsPopulares');
});


Route::group(['prefix' => 'pedidos'], function () {
    Route::get('/list','PedidosController@list')->name('pedidos.list');
    Route::post('/', 'PedidosController@store')->name('pedidos.store');
});


Route::get('/confirmacion', function () {
    return view('orders.confirmacion');
})->middleware('auth');

Route::get('/mispedidos', function () {
    return view('orders.misPedidos');
})->middleware('auth');

Route::get('/ordenes',"OrderController@list")->middleware('auth');
Route::get('/ordenes/list',"OrderController@listAdmin")->name('orders.list')->middleware(['auth','has.role:admin']);
Route::get('/ordenes/admin', 'OrderController@index')->name('orders.index');
