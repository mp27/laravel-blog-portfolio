<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class UnsubscribeAction
{
    public function __construct()
    {
    }

    public function run($token)
    {
        $subscriber = Subscriber::where('token', $token)->subscribed()->firstOrFail();

        $subscriber->subscribed = false;

        return $subscriber->save();
    }
}
