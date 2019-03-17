<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\ArticleRepository;
use App\Jobs\UploadArticleImage;
use App\Jobs\DeleteArticleImageDirectory;

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

    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);

        $article = $this->articles->save(request());

        if (request()->hasFile('image')) {
            UploadArticleImage::dispatch(request()->image, $article);
        }

        return redirect()
            ->route('articles.edit', ['id' => $article->id])
            ->with('successMsg', 'Article has been saved.');
    }

    public function edit($id)
    {
        $article = $this->articles->find($id);

        return view('articles.edit', compact('article', 'currentTags'));
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);

        $article = $this->articles->update(request(), $id);

        if (request()->hasFile('image')) {
            UploadArticleImage::dispatch(request()->image, $article);
        }

        return back()->with('successMsg', 'Article has been updated.');
    }

    public function destroy($id)
    {
        $article = $this->articles->find($id);

        DeleteArticleImageDirectory::dispatch($article->imageDir());

        $this->articles->delete($article);

        return back()->with('successMsg', 'Article has been deleted.');
    }
}
