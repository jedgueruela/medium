<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Tag;

class Article extends Model
{
	protected $fillable = ['title', 'slug', 'body', 'thumbnail_path'];

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
}
