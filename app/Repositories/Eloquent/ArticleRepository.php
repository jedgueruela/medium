<?php

namespace App\Repositories\Eloquent;

use App\Article;
use Illuminate\Http\Request;

class ArticleRepository
{
	protected $articles;

	public function __construct(Article $articles)
	{
		$this->articles = $articles;
	}

	public function all()
	{
		return $this->articles->paginate(10);
	}

	public function destroy($id)
	{
		return $this->articles->findOrFail($id)->delete();
	}

	public function save(Request $request)
	{
		$article = $this->articles->create($request->all());
	}
}