<?php


namespace App\Actions\Files;

use File;

class DeleteThumbnailAction
{
    public function __construct()
    {
    }

    public function run($path)
    {
        return File::delete($path);
    }
}
