<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    private $user;

    public function testArticleIndexWhenNotLoggedIn()
    {
        $response = $this->get('/articles/');

        $response->assertRedirect('/login/');
        $response->assertStatus(302);
    }

    public function testArticleIndexWhenLoggedIn()
    {
        $this->fakeAuth();

        $response = $this->get('/articles/');

        $response->assertStatus(200);
    }

    public function testCreateArticleWithImage()
    {
        $this->fakeAuth();

        Storage::fake('public');

        $params = [
            'title' => 'Some nice title',
            'body' => 'Some useful article content.',
        ];

        $this->call('POST', route('articles.store'), array_merge($params, [
            'image' => UploadedFile::fake()->create('thumbnail.jpg', 1024)
        ]));

        Storage::disk('public')->assertExists('/photos/articles/1/thumbnail.jpg');

        $this->assertDatabaseHas('articles', $params);
    }

    protected function fakeAuth()
    {
        $this->be(factory(User::class)->create());
    }
}
