<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersControllerTest extends TestCase
{
    /**
     * A index test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }
    /**
     *  get users with related posts
     */
    public function testGetUsersWithPosts()
    {
        $response = $this->get('/users-with-posts');

        $response->assertStatus(200);
        $response->assertSee('posts');
    }
    
}
