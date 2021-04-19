<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Author;
use Tests\TestCase;

class AuthorApiTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_author()
    {
        $formData = [
            'name' => 'Author Number Uno'
        ];

        $this->json('POST', route('author.store'), $formData)
            ->assertStatus(201)
            ->assertJson($formData);
    }

    public function test_can_update_author()
    {
        $author = factory(Author::class)->create();
        $updatedData = [
            'name' => 'Author Two'
        ];
        $this->json('PUT', route('author.update', $author->id), $updatedData)
            ->assertStatus(200)
            ->assertJson($updatedData);
    }

    public function test_can_delete_author()
    {
        $author = factory(Author::class)->create();

        $this->delete(route('author.destroy', $author->id))
            ->assertStatus(200);
    }

    public function test_can_list_author()
    {
        $authors = factory(Author::class, 3)->create();
        $this->get(route('author.index'))
            ->assertStatus(200)
            ->assertJson($authors->toArray());
    }

    public function test_can_show_author()
    {
        $author = factory(Author::class)->create();

        $this->get(route('author.show', $author->id))
            ->assertStatus(200);
    }

}
