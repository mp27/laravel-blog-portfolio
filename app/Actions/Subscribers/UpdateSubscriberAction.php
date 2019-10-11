<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class UpdateSubscriberAction
{
    public function __construct()
    {
    }

    public function run($request)
    {
        $subscriber = Subscriber::where('email', $request['email'])->where('token', $request['token'])->firstOrFail();

        $subscriber->subscribed = 1;

        return $subscriber->save();
    }
}
