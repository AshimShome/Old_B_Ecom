<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPP SHOPS | Contact</title>
</head>
<body>
        <h2>Hello Admin,</h2>
        You received an email from : <b>{{ $contact->name }}</b>
        <br>
        Here are the details:
        <br>
        <b>Name:</b> {{ $contact->name }}
        <br>
        <b>Email:</b> {{ $contact->email }}
        <br>

        <b>Subject:</b> {{ $contact->subject }}
        <br>
        <b>Message:</b> {{ $contact->message }}
        <br>
        Thank You
</body>
</html>
