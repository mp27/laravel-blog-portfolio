<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class StoreSubscriberAction
{
    public function __construct()
    {
    }

    public function run($request)
    {
        return Subscriber::create($request);
    }
}
