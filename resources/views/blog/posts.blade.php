@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <form action="{{route('public.posts')}}" method="GET">
                    <input type="text" placeholder="Search" name="search" class="form-control blog-input" value="{{request('search')}}">
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="col-md-4">
                    @include('includes.post-thumbnail', ['post' => $post])
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->appends(['search' => request('search')])->links()}}
        </div>
    </div>
@endsection
