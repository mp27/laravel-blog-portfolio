<?php


namespace App\Actions\Projects;


use App\Project;
use Illuminate\Http\Request;

class GetPaginatedProjectsAction
{
    public function __construct()
    {
    }

    public function run(Request $request, $perPage = 25)
    {
        return Project::latest()->paginate($perPage);
    }
}
