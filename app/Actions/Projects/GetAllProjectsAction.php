<?php


namespace App\Actions\Projects;


use App\Post;
use App\Project;
use Illuminate\Support\Facades\Cache;

class GetAllProjectsAction
{
    public function __construct()
    {
    }

    public function run()
    {
        return Cache::remember('projectsListing', 60 * 60 * 24 * 30, function () {
            return Project::with('images', 'tags')->get();
        });
    }

}
