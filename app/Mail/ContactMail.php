<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $senderName;
    public string $senderEmail;
    public string $mailSubject;
    public string $mailMessage;

    public function __construct(string $senderName, string $senderEmail, string $mailSubject, string $mailMessage)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->mailSubject = $mailSubject;
        $this->mailMessage = $mailMessage;
    }

    public function build()
    {
        return $this->subject($this->mailSubject)
            ->view('emails.contact')
            ->with([
                'senderName' => $this->senderName,
                'senderEmail' => $this->senderEmail,
                'mailSubject' => $this->mailSubject,
                'mailMessage' => $this->mailMessage,
            ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailSubject,
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
