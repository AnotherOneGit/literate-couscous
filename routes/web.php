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
    return \App\Book::distinct()
        ->join('scores', 'books.id', '=', 'scores.book_id')
        ->groupBy('title', 'books.id', 'scores.id')
        ->orderBy('score')
        ->get('title');
});
