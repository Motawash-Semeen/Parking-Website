<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $user['first_name'].' '.$user['last_name'] }}</p>
        <p><strong>Email:</strong> {{ $user['email'] }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $user['message'] }}</p>
    </div>
</body>

</html>
