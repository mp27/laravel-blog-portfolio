@extends('layouts.app')

@section('content')
    <div class="container text-white">
        <div class="row ">
            <div class="col-md-12">
                <h1 class="text-center">Contact us</h1>
                <div class="col-md-12">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <form action="{{route('contact.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control blog-input" id="name" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control blog-input" id="email" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control blog-input" id="subject" placeholder="Subject" name="subject">
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control blog-input"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark main-bg-color submit-button">SEND</button>
                </form>
            </div>
        </div>
    </div>
@endsection

