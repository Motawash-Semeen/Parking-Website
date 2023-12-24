<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookMail extends Mailable
{
    
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->data;

        return $this->from('thowdhury501@gmail.com')->view('emails.ordermail', compact('order'))->subject('Product Purchase Confirmation');
    }

    // public function build(): self
    // {
    //     $order = $this->data;
    //     return $this->from('ecomlaravel@example.com')->view('emails.odermail', compact('order'))->subject('Email From Ecommerce');
    // }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Email From Ecommerce',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     $order = $this->data;
    //     return new Content(
    //         view: 'emails.odermail',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
