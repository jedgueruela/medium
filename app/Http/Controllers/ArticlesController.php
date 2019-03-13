<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    	return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'thumbnail_path' => 'image',
        ]);

        $this->articles->save($request);

        return back()->with('successMsg', 'Article has been saved.');
    }

    public function destroy($id)
    {
        $this->articles->destroy($id);

        return back()->with('successMsg', 'Article has been deleted.');
    }
}
