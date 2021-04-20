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

Route::post('/register', 'AuthController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');

Route::get('/authors', 'AuthorController@index')->name('author.index');
Route::post('/authors', 'AuthorController@store')->name('author.store');
Route::get('/authors/{author}', 'AuthorController@show')->name('author.show');
Route::put('/authors/{author}', 'AuthorController@update')->name('author.update');
Route::delete('/authors/{author}', 'AuthorController@destroy')->name('author.destroy');

Route::get('/books', 'BookController@index')->name('book.index');
Route::post('/books', 'BookController@store')->name('book.store');
Route::get('/books/{book}', 'BookController@show')->name('book.show');
Route::put('/books/{book}', 'BookController@update')->name('book.update');
Route::delete('/books/{book}', 'BookController@destroy')->name('book.destroy');

Route::get('/search', 'BookController@search')->name('book.search');

Route::post('/score', 'ScoreController@store')->name('score.store');
