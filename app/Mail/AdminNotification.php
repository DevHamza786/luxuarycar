<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $driver;
    public $bookingUrl;

    public function __construct(Booking $booking, User $driver, $bookingUrl)
    {
        $this->booking = $booking;
        $this->driver = $driver;
        $this->bookingUrl = $bookingUrl;
    }

    public function build()
    {
        return $this->subject('New Ride Assigned')
            ->view('emails.admin_notification')
            ->with([
                'booking' => $this->booking,
                'driver' => $this->driver,
                'bookingUrl' => $this->bookingUrl,
            ]);
    }
}
