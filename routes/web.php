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

Route::get('/', 'PeliculaController@browse')->name('home');
Route::get('/pelicula', 'PeliculaController@index')->name('home');
//Route::post('/pelicula/filter', 'PeliculaController@filter');
Route::post('/pelicula/buscar', 'PeliculaController@filter');

Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'PeliculaController@ajaxImageUploadPost']);
Route::post('/pelicula/store', 'PeliculaController@store');
Route::post('/pelicula/delete/{id}', 'PeliculaController@destroy');
Route::post('/pelicula/edit', 'PeliculaController@edit');
Route::post('/pelicula/create', 'PeliculaController@create');
Route::post('/pelicula/update', 'PeliculaController@update');
Route::get('/pelicula/{id}', 'PeliculaController@detalle');

Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');






Route::get('/calidade', 'CalidadeController@index');
Route::post('/calidade/store', 'CalidadeController@store');
Route::post('/calidade/delete/{id}', 'CalidadeController@destroy');
Route::post('/calidade/edit', 'CalidadeController@edit');
Route::post('/calidade/update', 'CalidadeController@update');


Route::get('/genero', 'HomeController@index')->name('home');


Route::get('/genero/create', 'GeneroController@create');

Route::post('/genero/store', 'GeneroController@store');

Route::get('/genero/{id}', 'GeneroController@edit');

Route::patch('/genero/{id}', 'GeneroController@update');

Route::delete('/genero/{id}/delete', 'GeneroController@destroy');

Route::get('/artista/genero/{id}', 'ArtistaController@indexFilter');
//
//Route::post('/artista/create', 'ArtistaController@create');
////
//Route::put('/artista/store', 'ArtistaController@store');
////
//Route::post('/artista/update', 'ArtistaController@update');

//Route::get('/artista/{id}', 'ArtistaController@edit');

//Route::get('/artista', 'ArtistaController@index');
//
//
//
//Route::get('/cancione/create', 'CancioneController@create');
//
//Route::get('/cancione/artista/{id}', 'CancioneController@indexFilter');
//
//
//Route::resource('artista', 'ArtistaController');



Route::get('/artista/create', 'ArtistaController@create');

Route::put('/artista/store', 'ArtistaController@store');

Route::get('/artista/{id}', 'ArtistaController@edit');

Route::patch('/artista/{id}', 'ArtistaController@update');

Route::delete('/artista/{id}/delete', 'ArtistaController@destroy');

Route::get('/artista/artista/{id}', 'ArtistaController@indexFilter');

Route::get('/artista', 'ArtistaController@index');

Route::get('/cancione/create', 'CancioneController@create');

Route::post('/cancione/store', 'CancioneController@store');

Route::get('/cancione/{id}', 'CancioneController@edit');

Route::patch('/cancione/{id}', 'CancioneController@update');

Route::delete('/cancione/{id}/delete', 'CancioneController@destroy');

Route::get('/cancione/artista/{id}', 'CancioneController@indexFilter');

Route::get('/cancione', 'CancioneController@index');


//Route::post('/cancione/store', 'CancioneController@store');
//
//Route::get('/cancione/{id}', 'CancioneController@edit');
//
Route::post('/cancione/buscar', 'CancioneController@buscar');
//
//Route::resource('cancione', 'CancioneController');
