<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsControllerTest extends TestCase
{
    /**
     *  index test.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/comments');

        $response->assertStatus(200);
    }

     /**
     *  get posts with related comments
     */
    public function testGetCommentsWithPost()
    {
        $response = $this->get('/comments-with-post');

        $response->assertStatus(200);
        $response->assertSee('post');
    }

    /**
     *  get posts with related comments
     */
    public function testGetCommentsWithPostAndUser()
    {
        $response = $this->get('/comments-with-post-user');

        $response->assertStatus(200);
        $response->assertSee('post');
        $response->assertSee('user');

    }
}
