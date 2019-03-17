<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use App\Article;
use App\Services\ArticleImage;
use Image;
use File;

class UploadArticleImage
{
    use Dispatchable, SerializesModels;

    protected $image;

    protected $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UploadedFile $image, Article $article)
    {
        $this->image = $image;
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $directory = $this->article->imageDir();

        File::exists($directory) or File::makeDirectory($directory, 0777, true);

        $image = Image::make($this->image->getRealPath());
        $image->save($directory . 'full.jpg')
            ->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($directory . 'thumbnail.jpg');
    }
}
