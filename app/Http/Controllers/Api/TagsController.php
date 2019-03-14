<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TagRepository;

class TagsController extends Controller
{
	protected $tags;

	public function __construct(TagRepository $tags)
	{
		$this->tags = $tags;
	}

    public function index()
	{
		$tags = $this->tags->search(request()->only('term'));

		return response()->json($tags, 200);
	}
}
