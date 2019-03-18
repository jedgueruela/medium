<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Article;
use File;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    private $params = [
        'title' => 'Some nice title',
        'body' => 'Some useful article content.',
    ];

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

    public function testCreateArticle()
    {
        $this->fakeAuth();
        $this->call('POST', route('articles.store'), $this->params)->assertStatus(302);
        $this->assertDatabaseHas('articles', $this->params);
    }

    public function testDeleteArticle()
    {
        $article = factory(Article::class)->create($this->params);

        $this->fakeAuth();
        $this->call('DELETE', route('articles.destroy', $article->id))->assertStatus(302);
        $this->assertDatabaseMissing('articles', $this->params);
    }

    public function testUpdateArticle()
    {
        $article = factory(Article::class)->create($this->params);

        $newParams = [
            'title' => 'Awesome new title',
            'body' => 'Awesome new body'
        ];

        $this->fakeAuth();
        $this->call('PUT', route('articles.update', $article->id), $newParams)->assertStatus(302);

        $this->assertDatabaseMissing('articles', $this->params);
        $this->assertDatabaseHas('articles', $newParams);
    }

    protected function fakeAuth()
    {
        $this->be(factory(User::class)->create());
    }
}
