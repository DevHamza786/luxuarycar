<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $totalPrice;

    public function __construct($booking, $totalPrice)
    {
        $this->booking = $booking;
        $this->totalPrice = $totalPrice;
    }

    public function build()
    {
        return $this->view('emails.booking_payment')
                    ->with([
                        'bookingId' => $this->booking->id,
                        'totalPrice' => $this->totalPrice,
                        'paymentLink' => route('booking.payment', ['booking_id' => $this->booking->id]),
                    ]);
    }
}
