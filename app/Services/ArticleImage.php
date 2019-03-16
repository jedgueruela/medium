<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Image;
use File;

class ArticleImage
{
	public static function save(UploadedFile $image, $directory)
	{
		File::exists($directory) or File::makeDirectory($directory, 0777, true);

		$image = Image::make($image->getRealPath());
		$image->save($directory . 'full.jpg')
			->resize(360, null, function ($constraint) {
			    $constraint->aspectRatio();
			})->save($directory . 'thumbnail.jpg');
	}
}