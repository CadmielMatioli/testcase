<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinalRegisterUsersEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $user, public $rows)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Saudações',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.import-file',
            with: [
                'user' => $this->user,
                'rows' => $this->rows
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
