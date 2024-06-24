<!DOCTYPE html>
<html>
<head>
    <title>Booking Payment</title>
</head>
<body>
    <h1>Payment for Booking #{{ $bookingId }}</h1>
    <p>Total Price: ${{ $totalPrice }}</p>
    <p><a href="{{ $paymentLink }}">Click here to pay</a></p>
</body>
</html>
