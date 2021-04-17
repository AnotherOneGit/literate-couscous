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
    return \App\Book::with('scores', 'author')->get();
});

Route::get('/search', function (\Illuminate\Http\Request $request) {
    return \App\Book::with('author', 'scores')
        ->where('title', 'like',  "%$request->search%")
        ->orWhereHas('author', function ($query) use ($request) {
            return $query->where('name', 'like', "%$request->search%");
        })
        ->get();
});
