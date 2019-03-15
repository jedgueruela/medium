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

	public function all()
	{
		return $this->articles->paginate(10);
	}

	public function find($id)
	{
		$article = $this->articles->findOrFail($id);

		return $article;
	}

	public function save(Request $request)
	{
		$article = $this->articles->create($request->only(['title', 'body']));

		$this->syncTags($article, $request->input('tags', []));

		if ($request->hasFile('image')) {
			$article->saveImage($request->image);
		}

		return $article;
	}

	public function update(Request $request, $id)
	{
		$article = $this->find($id);

		$article->update($request->all());

		$this->syncTags($article, $request->input('tags', []));

		return $article;
	}

	public function destroy($id)
	{
		return $this->articles->findOrFail($id)->delete();
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