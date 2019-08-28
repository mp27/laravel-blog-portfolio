@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$post->title}}</div>
                    <div class="card-body">
                        <p><strong>Category: {{$post->category->name}}</strong></p>
                        <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
