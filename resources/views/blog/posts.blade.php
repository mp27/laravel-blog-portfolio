@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
            <div class="col-md-4">
               @include('includes.post-thumbnail', ['post' => $post])
            </div>
        @endforeach
    </div>
    <div>
        {{$posts->links()}}
    </div>
</div>
@endsection
