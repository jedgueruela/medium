<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Tag;
use App\Traits\Image;

class Article extends Model
{
	use Image;

	protected $fillable = ['title', 'slug', 'body'];

	public static function boot()
	{
		parent::boot();
		
		static::saving(function ($model) {
	        $model->slug = Str::slug($model->title);
        });
	}

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function getExcerptAttribute()
    {
        return strip_tags(Str::words($this->body, 40, '...'));
    }

    public function tagList()
	{
		return $this->tags()
			->pluck('name')
			->toArray();
	}

	public function imageBaseUri()
	{
		return '/photos/articles/' . $this->id . '/';
	}
}
