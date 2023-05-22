<?php

namespace App\Listeners;

use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class SendNewUserRegisteredEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $user = $event->user;

        //send the mail with details of the user, coming with the event

        $to = "torfs.cock@telenet.be";
        Mail::to($to)->send(new UserRegistered($user));


    }
}
