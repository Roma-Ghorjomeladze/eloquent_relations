<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


class LikeTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function a_post_can_be_liked(){
        $this->actingAs(User::factory()->create());
        $post = Post::factory()->create();
        $post->like();
        $this->assertCount(1, $post->likes);
        $this->assertTrue($post->likes->contains('id', auth()->user()->id));
    }
    /** @test */
    public function a_comment_can_be_liked(){
        $this->actingAs(User::factory()->create());
        $comment = Comment::factory()->create();
        $comment->like();
        $this->assertCount(1, $comment->likes);
        $this->assertTrue($comment->likes->contains('id', auth()->user()->id));
    }
}
