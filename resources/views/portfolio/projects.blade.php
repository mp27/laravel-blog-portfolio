@extends('layouts.app')

@section('content')
    <div class="container text-white">
        @foreach($projects as $project)
            <div class="bg-dark">
                <h2 class="text-center mt-3 mb-3">{{$project->name}}</h2>
                <div class="row">
                    <div class="col-md-6">
                        @if(count($project->images))
                            <div class="carousel slide" id="carouselExampleControls-{{$project->id}}"
                                 data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($project->images as $image)
                                        @if(file_exists(public_path() . '/' .  $image->src))
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <img src="{{asset($image->src)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls-{{$project->id}}"
                                   role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls-{{$project->id}}"
                                   role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="details">
                            {{$project->description}}
                            <div class="project-tags">
                                @foreach($project->tags as $tag)
                                    <span class="badge badge-pill badge-success">{{$tag->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.carousel').carousel()
        });
    </script>
@endsection
