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
		$articles = $this->articles->paginate();

		return response()->json($articles, 200);
	}
}
