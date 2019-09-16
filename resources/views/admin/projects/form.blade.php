<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name"
           value="{{ isset($project->name) ? $project->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" name="description" id="description" cols="30" rows="10">
        {{isset($project->description) ? $project->description : ''}}
    </textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    <label for="tags" class="control-label">{{ 'Tags' }}</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach($tags as $tag)
            <option value="{{$tag->id}}"
                    @if(!empty($project) && in_array($tag->id, $project->tags->pluck('id')->toArray())) selected @endif>
                {{$tag->name}}
            </option>
        @endforeach
    </select>
    {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Images' }}</label>
    <input class="form-control" name="images[]" multiple="multiple" type="file" id="images">
    {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
</div>

<div class="row">
    @foreach($project->images as $image)
        <div class="col-md-4 mb-3">
            <img src="{{asset($image->src)}}" alt="">
            <button class="btn btn-danger delete-image" data-url="{{route('projectImage.delete', $image->id)}}">X
            </button>
        </div>
    @endforeach
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-image').on('click', function (event) {
                event.preventDefault();
                const url = $(this).data('url');
                const csrf_token = $('input[name="_token"]').val();
                console.log(csrf_token);

                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _token: csrf_token
                    },
                    success: function () {
                        window.location.reload();
                    }
                });
            })
        });
    </script>
@endsection
