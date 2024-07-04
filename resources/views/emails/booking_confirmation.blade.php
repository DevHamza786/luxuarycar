<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            width: 150px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #333333;
            font-size: 24px;
            text-align: center;
        }
        .content p {
            color: #666666;
            font-size: 16px;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #999999;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #1a73e8;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover {
            background-color: #155bb5;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .content h1 {
                font-size: 20px;
            }
            .content p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://luxuryccs.com/home/assets/images/logo.png" alt="LuxuryCCS Logo">
        </div>
        <div class="content">
            <h1>Booking Confirmation</h1>
            <p>Your booking has been confirmed.</p>
            <div class="details">
                <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                <p><strong>Mode:</strong> {{ $booking->mode }}</p>
                <p><strong>Date:</strong> {{ $booking->date }}</p>
                <p><strong>Time:</strong> {{ $booking->time }}</p>
                <p><strong>Car Category:</strong> {{ $booking->car_category }}</p>
                <p><strong>Pick-up Location:</strong> {{ $booking->pick_location }}</p>
                <p><strong>Drop-off Location:</strong> {{ $booking->drop_location }}</p>
                <p><strong>Distance:</strong> {{ $booking->distance }}</p>
                <p><strong>Fare Time:</strong> {{ $booking->fare_time }}</p>
                <p><strong>Passenger:</strong> {{ $booking->passenger }}</p>
                <p><strong>Estimated Price:</strong> ${{ $totalPrice }}</p>
            </div>
            <p>For more details, you can view your <a class="button" href="{{ $bookingLink }}">Booking Here</a>.</p>
            <p>Thank you for choosing LuxuryCCS. If you have any questions or need assistance, feel free to reach out to our support team.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 LuxuryCCS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
