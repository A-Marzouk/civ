<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $user ; // public to be accessed in the view.
    public $reminderPeriod;
    /**
     * Create a new message instance.
     * @param \App\User $user
     * @param $reminderPeriod
     * @return void
     */
    public function __construct($user, $reminderPeriod)
    {
        $this->user = $user;
        $this->reminderPeriod = $reminderPeriod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from civ.ie | Activation reminder')
            ->from('info@civ.ie')
            ->markdown('emails.activation_reminder');
    }
}
