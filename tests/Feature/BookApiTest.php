<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_book()
    {
        factory(Author::class)->create();

        $book = [
            'author_id' => 1,
            'title' => 'Test Book'
        ];

        $this->json('POST', route('book.store'), $book)
            ->assertStatus(201)
            ->assertJson($book);
    }

    public function test_can_update_book()
    {
        $book = factory(Book::class)->create();
        $updatedData = [
            'title' => 'Test Book'
        ];
        $this->json('PUT', route('book.update', $book->id), $updatedData)
            ->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function test_can_delete_book()
    {
        $book = factory(Book::class)->create();
        $this->delete(route('book.destroy', $book->id))
            ->assertStatus(200);
    }

    public function test_can_list_book()
    {
        $book = factory(Book::class, 3)->create();
        $this->get(route('book.index'))
            ->assertStatus(200)
            ->assertJson($book->toArray());
    }

    public function test_can_show_book()
    {
        $book = factory(Book::class)->create();
        $this->get(route('book.show', $book->id))
            ->assertStatus(200);
    }

    public function test_can_search_book()
    {
        $book = factory(Book::class)->create();
        $this->get(route('book.search', $book->title))
            ->assertStatus(200);
    }
}
