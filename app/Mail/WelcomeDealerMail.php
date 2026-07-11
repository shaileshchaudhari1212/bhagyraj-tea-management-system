<?php

namespace App\Mail;

use App\Models\Dealer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeDealerMail extends Mailable
{
    use Queueable, SerializesModels;

    public Dealer $dealer;

    public string $password;

    /**
     * Create a new message instance.
     */
    public function __construct(Dealer $dealer, string $password)
    {
        $this->dealer = $dealer;
        $this->password = $password;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Welcome to Bhagyraj Tea Dealer Portal')
            ->view('emails.welcome-dealer');
    }
}