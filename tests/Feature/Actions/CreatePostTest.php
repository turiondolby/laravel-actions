<?php

namespace Tests\Feature\Actions;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Actions\CreatePost;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_and_returns_a_post()
    {
        $action = new CreatePost();

        $post = $action->run($user = User::factory()->create(), [
            'body' => 'A post'
        ]);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertTrue($user->posts->contains($post));
    }
}
