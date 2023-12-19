<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $link = "";
    public  $MYMESSAGE='please visit this link to update your password :';
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'noreply@steps-sa.co';
        $subject = 'RESET YOUR PASSWORD !';
        $name = 'Steps';
        return $this->view('mail')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
