<?php

namespace App\Http\Controllers;

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
    	$articles = $this->articles->all();

    	return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function show($id)
    {
        
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);

        $article = $this->articles->save(request());

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
        ]);

        $this->articles->update(request(), $id);

        return back()->with('successMsg', 'Article has been updated.');
    }

    public function destroy($id)
    {
        $this->articles->destroy($id);

        return back()->with('successMsg', 'Article has been deleted.');
    }
}
