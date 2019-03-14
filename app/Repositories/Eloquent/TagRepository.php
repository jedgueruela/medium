<?php

namespace App\Repositories\Eloquent;

use App\Tag;

class TagRepository
{
	protected $tags;

	public function __construct(Tag $tags)
	{
		$this->tags = $tags;
	}

	public function search(array $criteria)
    {
        $tags = $this->tags->ofTerm($criteria['term'])->pluck('name');

        $data = [];

        foreach ($tags as $tag)
        {
            $data[] = ['id' => $tag, 'text' => $tag];
        }

        return $data;
    }
}