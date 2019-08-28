<a href="{{route('public.post.show', $post->slug)}}">
    <div class="card">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <p><strong>Category: {{$post->category->name}}</strong></p>
            <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}">
        </div>
    </div>
</a>
