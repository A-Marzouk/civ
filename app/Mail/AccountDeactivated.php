<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountDeactivated extends Mailable
{
    use Queueable, SerializesModels;
    public $user ; // public to be accessed in the view.

    /**
     * Create a new message instance.
     * @param \App\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from civ.ie | Account deactivated')
            ->from('info@civ.ie')
            ->markdown('emails.user.account_deactivated');
    }
}
