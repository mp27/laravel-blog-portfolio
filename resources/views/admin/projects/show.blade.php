@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">project {{ $project->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/projects') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <a href="{{ url('/admin/projects/' . $project->id . '/edit') }}" title="Edit project">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Edit
                            </button>
                        </a>

                        <form method="POST" action="{{ url('admin/projects' . '/' . $project->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete project"
                                    onclick="return confirm(&quot;Confirm; delete?;&quot;)"><i class="fa fa-trash-o"
                                                                                               aria-hidden="true"></i>
                                Delete
                            </button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $project->id }}</td>
                                </tr>
                                <tr>
                                    <th> Name</th>
                                    <td> {{ $project->name }} </td>
                                </tr>
                                <tr>
                                    <th> Description</th>
                                    <td> {{ $project->description }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
