<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h2>Congratulations! You're Registered!</h2>
        <p>Dear {{ $user['name'] }},</p>
        <p>Congratulations! You have successfully registered for ParKing. We are excited to have you as part of our community.</p>
        <p>Your registration details:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user['name'] }}</li>
            <li><strong>Email:</strong> {{ $user['email'] }}</li>
            <!-- Add any other relevant registration details here -->
        </ul>
        <p>Thank you for choosing ParKing. If you have any questions or need assistance, feel free to contact our support team.</p>
        <p>We look forward to providing you with a great experience!</p>
        <p>Best regards,</p>
        <p>ParKing</p>
    </div>
</body>

</html>
