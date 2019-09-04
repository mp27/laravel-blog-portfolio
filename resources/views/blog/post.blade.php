@extends('layouts.app')

@section("meta")
    <meta name="description" content="{{$post->description}}">
    <meta name="keywords" content="{{$post->keywords}}">
@endsection

@section('content')
    <div class="container">
        <div class="text-white">
            <h1 class="text-center">{{$post->title}}</h1>
            <div class="row">
                <div class="col-md-8">
                    {!! $post->content !!}
                </div>
                <div class="col-md-4">
                    Sidebar
                </div>
            </div>
        </div>
    </div>
@endsection
