<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SESMAILDRIVER extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $username = null;
    public $password = null;
    public $site_url = null;
    public $panel_url = null;
    public function __construct($username,$password,$site_url , $panel_url)
    {
        $this->username = $username;
        $this->password = $password;
        $this->site_url = $site_url;
        $this->panel_url = $panel_url;
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
