<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DriverAssgined extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $bookingUrl;

    public function __construct(Booking $booking, $bookingUrl)
    {
        $this->booking = $booking;
        $this->bookingUrl = $bookingUrl;
    }

    public function build()
    {
        return $this->subject('You have been assigned a new ride')
            ->view('emails.driver_assigned')
            ->with([
                'booking' => $this->booking,
                'bookingUrl' => $this->bookingUrl,
            ]);
    }
}
