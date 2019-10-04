<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class GetAllSubscribersAction
{

    public function __construct()
    {
    }

    public function run($request, $perPage = 20)
    {
        $subscribers =  Subscriber::latest();

        if (!empty($request->active)) {
            if ($request->active == 'true') {
                $subscribers = $subscribers->subscribed();
            } else {
                $subscribers = $subscribers->subscribed(false);
            }
        }

        $subscribers = $subscribers->paginate($perPage);

        return $subscribers;
    }
}
