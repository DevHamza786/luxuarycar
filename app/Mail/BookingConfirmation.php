<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $totalPrice;
    public $bookingLink;

    public function __construct(Booking $booking , $totalPrice)
    {
        $this->booking = $booking;
        $this->totalPrice = $totalPrice;
        $this->bookingLink = route('map.show', ['id' => $this->booking->id]);

    }

    public function build()
    {
        return $this->subject('Booking Confirmation')
                    ->view('emails.booking_confirmation')
                    ->with([
                        'booking' => $this->booking,
                        'totalPrice' => $this->totalPrice,
                        'bookingLink' => $this->bookingLink
                    ]);
    }
}
