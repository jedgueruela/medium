<?php

namespace App\Repositories\Eloquent;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;
use Image;

class ArticleRepository
{
	protected $articles;

	protected $tags;

	public function __construct(Article $articles, Tag $tags)
	{
		$this->articles = $articles;
		$this->tags = $tags;
	}

	public function paginate($noOfItems = 10)
	{
		return $this->articles->latest()->paginate($noOfItems);
	}

	public function find($id)
	{
		$article = $this->articles->findOrFail($id);

		return $article;
	}

	public function findBySlug($slug)
	{
		return $this->articles->whereSlug($slug)->firstOrFail();
	}

	public function save(Request $request)
	{
		$article = $this->articles->create($request->only(['title', 'body']));

		$this->syncTags($article, $request->input('tags', []));

		return $article;
	}

	public function update(Request $request, $id)
	{
		$article = $this->find($id);

		$article->update($request->all());

		$this->syncTags($article, $request->input('tags', []));

		return $article;
	}

	public function delete(Article $article)
	{
		return $article->delete();
	}

	private function syncTags($article, array $tagList)
    {
        $tags = [];

        foreach($tagList as $tag)
        {
            $tag = $this->tags->firstOrCreate(['name' => $tag]);

            $tags[] = $tag->id;
        }

        $article->tags()->sync($tags);
    }
}