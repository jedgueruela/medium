<?php

namespace App\Traits;

use File;

trait Image
{
	public function fullImage()
	{
		if ($this->hasFullImage()) {
			return $this->fullImageUri();
		}

		return '/photos/default-full.png';
	}

	public function hasFullImage()
	{
		return File::exists(public_path($this->fullImageUri()));
	}

	public function fullImageUri()
	{
		return $this->imageBaseUri() . '/full.jpg';
	}

	public function thumbnailImage()
	{
		if ($this->hasThumbnailImage()) {
			return $this->thumbnailImageUri();
		}

		return '/photos/default-thumbnail.png';
	}

	public function hasThumbnailImage()
	{
		return File::exists(public_path($this->thumbnailImageUri()));
	}

	public function thumbnailImageUri()
	{
		return $this->imageBaseUri() . '/thumbnail.jpg';
	}

	public function imageDir()
	{
		return public_path($this->imageBaseUri());
	}
}
