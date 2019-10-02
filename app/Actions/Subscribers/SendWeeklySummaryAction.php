<?php


namespace App\Actions\Subscribers;


use App\Actions\Posts\LatestPostsAction;
use App\Mail\WeeklySummary;
use Illuminate\Support\Facades\Mail;

class SendWeeklySummaryAction
{
    private $getActiveSubscribers;
    private $latestPostsAction;

    public function __construct(GetActiveSubscribers $getActiveSubscribers, LatestPostsAction $latestPostsAction)
    {
        $this->getActiveSubscribers = $getActiveSubscribers;
        $this->latestPostsAction = $latestPostsAction;
    }

    public function run() {
        $subscribers = $this->getActiveSubscribers->run();
        $posts = $this->latestPostsAction->run();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber)->queue(new WeeklySummary($subscriber, $posts));
        }
    }
}
