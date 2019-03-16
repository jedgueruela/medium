<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use File;

class DeleteArticleImageDirectory
{
    use Dispatchable, SerializesModels;

    protected $directory;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($directory)
    {
        $this->directory = $directory;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        File::deleteDirectory($this->directory);
    }
}
