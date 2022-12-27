<?php

namespace App\Mail;

use App\Models\Tool;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DueTimeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $tools;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $tools)
    {
        $this->tools=$tools;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.dueTimeMail');
    }
}
