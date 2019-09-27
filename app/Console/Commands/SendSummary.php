<?php

namespace App\Console\Commands;

use App\Actions\Subscribers\GetActiveSubscribers;
use App\Mail\WeeklySummary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly email summary';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(GetActiveSubscribers $getActiveSubscribers)
    {
        $subscribers = $getActiveSubscribers->run();

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber)->send(new WeeklySummary($subscriber));
        }
    }
}
