<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use App\Article;
use App\Services\ArticleImage;

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
        ArticleImage::save($this->image, $this->article->imageDir());
    }
}
