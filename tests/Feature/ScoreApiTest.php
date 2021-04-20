<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScoreApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_score()
    {
        factory(Book::class)->create();

        $score = [
            'book_id' => 1,
            'score' => 5
        ];

        $this->json('POST', route('score.store'), $score)
            ->assertStatus(201)
            ->assertJson($score);
    }
}
