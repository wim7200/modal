<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DueTimeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tools;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tools)
    {
        $this->tools=$tools;
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
