<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class OrderCreatedMail extends Mailable
{
    public function __construct()
    {
    }

    public function build()
    {
        return $this->markdown('emails.order-created');
    }
}
