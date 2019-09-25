<form method="POST" action="{{route('public.subscriber.store')}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="form-group col-md-4">
            <input type="text" placeholder="Name" name="name" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <input type="email" placeholder="email" name="email" class="form-control">
        </div>

        <div class="form-group col-md-4">
            <button type="submit" class="btn btn-light">SUBSCRIBE</button>
        </div>
    </div>
</form>
