<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class approvalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'noreply@steps-sa.co';
        $subject = 'congrats your site is ready !';
        $name = 'Steps';
        return $this->view('mail')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);

    }
}
