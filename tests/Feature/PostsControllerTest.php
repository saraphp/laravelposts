<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{
    /**
     * index test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }
      /**
     *  get posts with related user
     */
    public function testGetPostsWithUser()
    {
        $response = $this->get('/posts-with-user');

        $response->assertStatus(200);
        $response->assertSee('user');
    }

    /**
     *  get posts with related comments
     */
    public function testGetPostsWithComments()
    {
        $response = $this->get('/posts-with-comments');

        $response->assertStatus(200);
        $response->assertSee('comments');
    }
}
