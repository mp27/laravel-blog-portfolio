@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Subscribers</div>
                    <div class="card-body">
                        <form action="{{route('subscriber.index')}}">
                            <select class="form-control" name="active">
                                <option value="" @if(empty(request('active'))) selected @endif>All</option>
                                <option value="true" @if(request('active') == 'true') selected @endif>Subscribed</option>
                                <option value="false" @if(!empty(request('active')) && request('active') != 'true') selected @endif>Unsubscribed</option>
                            </select>
                            <button type="submit" class="btn btn-dark mt-3">Filter</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subscribed</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subscribers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            {{$item->email}}
                                        </td>
                                        <td>
                                            {{$item->subscribed ? 'Yes': 'No'}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td><h4>No subscribers</h4></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div
                                class="pagination-wrapper"> {!! $subscribers->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
