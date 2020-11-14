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
    public $senderEmail;

    /**
     * Create a new message instance.
     * @param $emailData
     * @param $emailSubject
     * @param $senderEmail
     * @return void
     */
    public function __construct($emailSubject, $emailData, $senderEmail)
    {
        $this->emailSubject = $emailSubject ;
        $this->emailData = $emailData ;
        $this->senderEmail = $senderEmail ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->emailSubject )
            ->from($this->senderEmail)
            ->markdown('emails.admin.custom_mail');
    }
}
