<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function create_book()
    {
        $this->withoutExceptionHandling();

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession([])
                         ->get('/');
        $payload = [
            'title' => $this->faker->title,
            'body'  => $this->faker->paragraph,
            'user_id'   => 24
        ];

        $this->post('books/store', $payload);

        $this->assertDatabaseHas('books', $payload);
    }
}
