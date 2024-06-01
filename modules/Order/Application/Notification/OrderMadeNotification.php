<?php
declare(strict_types=1);

namespace Modules\Order\Application\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Modules\Order\Contracts\OrderDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Order\Domain\Entity\Order;

class OrderMadeNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order,
    ) {
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Completed',
        );
    }

    public function build()
    {
        $message = 'Your order was completed id: #' . $this->order->getId()->getId();
        return $this->html($message)->subject($message);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'order::emails.order_created',
            with: [
                'orderId' => $this->order->getId()->getId(),
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
