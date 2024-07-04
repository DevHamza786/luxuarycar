<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Status Updated Notification</title>
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
            <p>Hello Admin,</p>

            <p>The ride status has been updated:</p>

            <div class="details">
                <ul>
                    <li><strong>Ride Status:</strong> {{ $booking->status }}</li>
                    <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
                    <li><strong>User Name:</strong> {{ $booking->userData->name }}</li>
                    <li><strong>User Email:</strong> {{ $booking->userData->email }}</li>
                    <li><strong>Pickup Location:</strong> {{ $booking->pick_location }}</li>
                    <li><strong>Driver Name:</strong> {{ $booking->driverData->name }}</li>
                    <li><strong>Driver Car Number:</strong> {{ $booking->driverData->driverData->register_no }}</li>
                    <li><strong>Driver Car Category:</strong> {{ $booking->driverData->driverData->category }}</li>
                    <li><strong>Driver Car Model:</strong> {{ $booking->driverData->driverData->model }}</li>
                    <li><strong>Driver Car Brand:</strong> {{ $booking->driverData->driverData->brand }}</li>
                    <!-- Add more details as needed -->
                </ul>
            </div>

            <p>Thank you.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
