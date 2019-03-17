<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ArticleRepository;

class ArticlesController extends Controller
{
    protected $articles;

	public function __construct(ArticleRepository $articles)
	{
		$this->articles = $articles;
	}

    public function index()
	{
		$data = [];

		$articles = $this->articles->paginate();

		if (! $articles->isEmpty()) {
			foreach ($articles as $article) {
				$data[] = [
					'title' => $article->title,
					'excerpt' => $article->excerpt,
					'slug' => $article->slug,
					'thumbnail_image' => $article->thumbnailImage(),
					'tags' => $article->tagList()
				];
			}
		}

		return response()->json($data, 200);
	}

	public function show($slug)
	{
		$article = $this->articles->findBySlug($slug);

		return response()->json([
			'title' => $article->title,
			'body' => $article->body,
			'featured_image' => $article->fullImage(),
			'tags' => $article->tagList()
		], 200);
	}
}
