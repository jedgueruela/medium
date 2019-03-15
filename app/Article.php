<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Services\ArticleImage;
use App\Tag;

class Article extends Model
{
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

    public function tagList()
	{
		return $this->tags()
			->pluck('name')
			->toArray();
	}

	public function saveImage(UploadedFile $image)
	{
		ArticleImage::save($image, $this->imageDir());
	}

	protected function imageDir()
	{
		return public_path('/photos/articles/' . $this->id . '/');
	}
}
