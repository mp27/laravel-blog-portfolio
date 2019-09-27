<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class GetActiveSubscribers
{
    public function __construct()
    {
    }

    public function run() {
        return Subscriber::where('subscribed', true)->get();
    }
}
