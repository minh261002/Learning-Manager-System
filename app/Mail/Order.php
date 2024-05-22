<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    function __construct(public $data)
    {
        //
    }

    function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đơn hàng của bạn đã được xác nhận',
        );
    }

     function content(): Content
    {
        $order = $this->data;
        return new Content(
            view: 'mail.order_mail',
            with: ['order' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}