<a href="{{route('public.post.show', $post->slug)}}" class="mb-3 d-block thumbnail-card-link">
    <div class="card bg-dark">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body p-0">
            <span class="badge badge-primary m-2">{{$post->category->name}}</span>
            <img src="{{asset($post->thumbnail)}}" alt="{{$post->title}}" class="w-100 d-block">
        </div>
    </div>
</a>
