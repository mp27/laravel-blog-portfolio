<?php


namespace App\Actions\Subscribers;


use App\Mail\SubscribeConfirmation;
use App\Mail\WeeklySummary;
use App\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreSubscriberAction
{
    public function __construct()
    {
    }

    public function run($request)
    {
        $request['token'] = Str::random(16);
        $request['subscribed'] = 0;

        $existingSubscriber = Subscriber::where('email', $request['email'])->first();

        if (!$existingSubscriber) {
            $existingSubscriber = Subscriber::create($request);
        }

        Mail::to($existingSubscriber)->queue(new SubscribeConfirmation($existingSubscriber));

        return $existingSubscriber;
    }
}
