<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::
        join('scores', 'books.id', 'scores.book_id')
            ->groupBy('title')
            ->orderBy(\DB::raw('AVG(score)'), 'desc')
            ->get('title');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Book::create([
            'author_id' => $request->author_id,
            'title' => $request->title
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return Book::findOrFail($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function search(Request $request)
    {
        return Book::with('author', 'scores')
            ->where('title', 'like',  "%$request->search%")
            ->orWhereHas('author', function ($query) use ($request) {
                return $query->where('name', 'like', "%$request->search%");
            })
            ->get();
    }
}
