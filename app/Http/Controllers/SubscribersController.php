<?php

namespace App\Http\Controllers;

use App\Actions\Subscribers\GetAllSubscribersAction;
use App\Actions\Subscribers\StoreSubscriberAction;
use App\Http\Requests\SubscriberRequest;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index(Request $request, GetAllSubscribersAction $getAllSubscribersAction)
    {
        return view('admin.subscribers.index')->with([
            "subscribers" => $getAllSubscribersAction->run($request),
        ]);
    }

    public function store(SubscriberRequest $request, StoreSubscriberAction $storeSubscriberAction)
    {
        $storeSubscriberAction->run($request->only(['name', 'email']));

        return redirect()->back();
    }
}
