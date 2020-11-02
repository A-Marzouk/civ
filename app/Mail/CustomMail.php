<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailData;
    public $emailSubject;

    /**
     * Create a new message instance.
     * @param $emailData
     * @param $emailSubject
     * @return void
     */
    public function __construct($emailSubject, $emailData)
    {
        $this->emailSubject = $emailSubject ;
        $this->emailData = $emailData ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->emailSubject )
            ->from('info@civ.ie')
            ->markdown('emails.admin.custom_mail');
    }
}
