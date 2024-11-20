<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SmtpEmail extends Mailable
{
    public $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function build()
    {
        return $this->subject('Your Subject')
                    ->html($this->body); // Send as HTML
    }
}
