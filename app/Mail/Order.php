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

    public $payment;
    public $orders;

    function __construct($payment, $orders)
    {
        $this->payment = $payment;
        $this->orders = $orders;
    }

    function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Đơn hàng của bạn đã được xác nhận',
        );
    }

    function content(): Content
    {
        return new Content(
            view: 'emails.order_mail',
            with: [
                'payment' => $this->payment,
                'orders' => $this->orders
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}