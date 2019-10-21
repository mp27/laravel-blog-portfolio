<?php


namespace App\Actions\Contact;


use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class SendContactMailAction
{
    public function __construct()
    {
    }

    public function run($request) {
        Mail::queue(new ContactMail($request->all()));
    }
}
