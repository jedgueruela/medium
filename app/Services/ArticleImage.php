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

		$extension = $image->getClientOriginalExtension();

		$image = Image::make($image->getRealPath());
		$image->save($directory . 'full.' . $extension)
			  ->crop(300, 300)
			  ->save($directory . 'thumbnail.' . $extension);
	}
}