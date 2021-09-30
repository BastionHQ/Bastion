<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class UserUpdatedMail extends Mailable
{
    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->markdown('emails.user-updated');
    }
}
