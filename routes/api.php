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

Route::get('/authors', 'AuthorController@index');
Route::post('/authors', 'AuthorController@store');
Route::get('/authors/{author}', 'AuthorController@show');
Route::put('/authors/{author}', 'AuthorController@update');
Route::delete('/authors/{author}', 'AuthorController@destroy');

Route::get('/books', 'BookController@index');
Route::post('/books', 'BookController@store');
Route::get('/books/{book}', 'BookController@show');
Route::put('/books/{book}', 'BookController@update');
Route::delete('/books/{book}', 'BookController@destroy');

Route::get('/search', 'BookController@search');

Route::post('/score', 'ScoreController@store');
