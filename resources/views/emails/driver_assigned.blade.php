<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ride Assigned</title>
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
        .content p {
            color: #666666;
            font-size: 16px;
            line-height: 1.6;
        }
        .details {
            margin: 20px 0;
        }
        .details ul {
            list-style-type: none;
            padding: 0;
        }
        .details li {
            margin-bottom: 10px;
        }
        .details li strong {
            font-weight: bold;
        }
        .action-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .action-button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #999999;
        }
        @media (max-width: 600px) {
            .container {
                padding: 10px;
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
            <p>Hello {{ $booking->driverData->name }},</p>

            <p>You have been assigned a new ride. Please review the details and prepare accordingly:</p>

            <div class="details">
                <ul>
                    <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
                    <li><strong>Booking Date:</strong> {{ $booking->date }}</li>
                    <li><strong>Booking Time:</strong> {{ $booking->time }}</li>
                    <!-- Add more details as needed -->
                </ul>
            </div>

            <p>You can view more details and manage the <a href="{{ $bookingUrl }}" class="action-button">Ride here</a>.</p>

            <p>Thank you,</p>
            <p>luxuryccs Car</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
