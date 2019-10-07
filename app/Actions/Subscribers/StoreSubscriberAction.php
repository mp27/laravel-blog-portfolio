<?php


namespace App\Actions\Subscribers;


use App\Subscriber;
use Illuminate\Support\Str;

class StoreSubscriberAction
{
    public function __construct()
    {
    }

    public function run($request)
    {
        $request['token'] = Str::random(16);

        $existingSubscriber = Subscriber::where('email', $request['email'])->first();

        if (!$existingSubscriber) {
            return Subscriber::create($request);
        }

        $existingSubscriber->subscribed = 1;

        return $existingSubscriber->save();
    }
}
