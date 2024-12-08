<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
</head>

<body>
<h2>You have received a new message</h2>

<p><strong>From:</strong> {{ $sender }}</p>

<p><strong>Subject:</strong> {{ $subject }}</p>

<p><strong>Message:</strong></p>

<p>{{ $content }}</p>

</body>

</html>
