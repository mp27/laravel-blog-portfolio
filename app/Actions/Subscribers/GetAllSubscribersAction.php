<?php


namespace App\Actions\Subscribers;


use App\Subscriber;

class GetAllSubscribersAction
{

    public function __construct()
    {
    }

    public function run($perPage = 20)
    {
        return Subscriber::latest()->paginate($perPage);
    }
}
