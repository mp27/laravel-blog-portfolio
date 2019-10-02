<h1>Weekly summary: {{$subscriber->name}}</h1>
@foreach($posts as $post)
    <div>
        <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}">
        <h3><a href="{{route('public.post.show', $post->slug)}}">{{$post->title}}</a></h3>
    </div>
@endforeach
