<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
            text-align: center;
            padding: 20px;
        }
        .content h1 {
            color: #333333;
            font-size: 24px;
        }
        .content p {
            color: #666666;
            font-size: 16px;
        }
        .otp {
            font-size: 28px;
            color: #1a73e8;
            letter-spacing: 2px;
            margin: 20px 0;
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
            .otp {
                font-size: 24px;
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
            <h1>Your OTP Code</h1>
            <p>Thank you for using LuxuryCCS. Your One-Time Password (OTP) for login is:</p>
            <div class="otp">{{$otpCode}}</div>
            <p>This code is valid for 10 minutes. If you did not request this code, please ignore this email.</p>
            <a href="https://luxuryccs.com/login" class="button">Login to LuxuryCCS</a>
        </div>
        <div class="footer">
            <p>&copy; 2024 LuxuryCCS. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
