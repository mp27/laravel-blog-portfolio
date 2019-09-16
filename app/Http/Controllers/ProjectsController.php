<?php

namespace App\Http\Controllers;

use App\Actions\Projects\DeleteProjectAction;
use App\Actions\Projects\FetchProjectAction;
use App\Actions\Projects\GetPaginatedProjectsAction;
use App\Actions\Projects\StoreProjectAction;
use App\Actions\Projects\UpdateProjectAction;
use App\Actions\Tags\GetAllTagsAction;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request, GetPaginatedProjectsAction $getPaginatedProjectsAction)
    {
        return view('admin.projects.index')->with([
            "projects" => $getPaginatedProjectsAction->run($request)
        ]);
    }

    public function show($id, FetchProjectAction $fetchProjectAction)
    {
        return view('admin.projects.show')->with([
            'project' => $fetchProjectAction->run($id)
        ]);
    }

    public function create(GetAllTagsAction $getAllTagsAction)
    {
        return view('admin.projects.create')->with([
            "tags" => $getAllTagsAction->run()
        ]);
    }

    public function store(ProjectRequest $request, StoreProjectAction $storeProjectAction)
    {
        $storeProjectAction->run($request->all());

        return redirect()->route('project.index')->with('flash_message', 'Project added!');
    }

    public function edit($id, FetchProjectAction $fetchProjectAction, GetAllTagsAction $getAllTagsAction)
    {
        return view('admin.projects.edit')->with([
            "project" => $fetchProjectAction->run($id),
            "tags" => $getAllTagsAction->run()
        ]);
    }

    public function update(ProjectRequest $request, $id, UpdateProjectAction $updateProjectAction)
    {
        $updateProjectAction->run($request->all(), $id);

        return redirect()->route('project.index')->with('flash_message', 'Project updated!');
    }

    public function destroy($id, DeleteProjectAction $deleteProjectAction)
    {
        $deleteProjectAction->run($id);
        return redirect()->route('project.index')->with('flash_message', 'Project deleted!');
    }
}
