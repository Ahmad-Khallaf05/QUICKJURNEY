<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Confirmation</title>
</head>

<body>

<h1>Booking Confirmation</h1>

<p>Hello {{ $booking->user->name }},</p>

<p>Thank you for your booking!</p>

<p>Please confirm your booking details:</p>

<p>
    <strong>Trip ID:</strong> {{ $booking->trip_id }}<br>
    <strong>Status:</strong> {{ $booking->status }}<br>
    <strong>Total Price:</strong> {{ $booking->trip->price }}
</p>

<p>Please click on the button below to confirm your booking:</p>

<x-mail::button :url="route('booking.confirm', $booking->id)">
    Confirm Booking
</x-mail::button>

<p>We look forward to seeing you on your trip!</p>

<p>Thanks,<br>
    {{ config('app.name') }}</p>

</body>

</html>
