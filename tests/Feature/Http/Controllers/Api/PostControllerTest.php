<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_store()
    {   

        // $this->withoutExceptionHandling();

        $response = $this->json('POST', 'api/posts', [
            'title' => 'Post de prueba'
        ]);

        $response->assertJsonStructure(['id', 'title', 'created_at', 'updated_at'])
                 ->assertJson(['title' => 'Post de prueba'])
                 ->assertStatus(201);

        $this->assertDatabaseHas('posts', ['title' => 'Post de prueba']);
    }
}
