<?php


namespace App\Actions\Projects;


use App\ProjectImage;
use File;


class DeleteProjectImageAction
{
    public function __construct()
    {
    }

    public function run(ProjectImage $image)
    {
        $src = $image->src;

        if ($image->delete()) {
            return File::delete($src);
        }

        return false;
    }
}
