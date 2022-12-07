<?php

namespace App\Mail;

use App\Models\Coach;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class CoachCancelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $coach;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Coach $coach, $reason)
    {
        $this->coach = $coach;
        $this->reason = $reason;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('admin@indofit.com', 'IndoFit'),
            subject: 'Permintaan Menjadi Pelatih IndoFit',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.deny-coach',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
