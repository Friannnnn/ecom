<?php
require 'vendor/autoload.php'; // Include the Composer autoload file

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Replace this with actual authentication logic
        $verification_code = rand(100000, 999999);
        $_SESSION['verification_code'] = $verification_code;
        $_SESSION['email'] = $email;

        sendVerificationEmail($email, $verification_code);
        echo "Verification code sent. Check your email.";
    } elseif (isset($_POST['verify'])) {
        $input_code = $_POST['verification_code'];

        if (isset($_SESSION['verification_code']) && $input_code == $_SESSION['verification_code']) {
            echo "Verification successful!";
            // Continue to your next steps
        } else {
            echo "Invalid verification code.";
        }
    }
}

function sendVerificationEmail($to, $verification_code) {
    $client = new Google_Client();
    $client->setApplicationName('Gmail API PHP');
    $client->setScopes(Google_Service_Gmail::GMAIL_SEND);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    $service = new Google_Service_Gmail($client);
    $user = 'me';

    $message = "Your verification code is: $verification_code";
    $mime = "From: Your Name <your-email@gmail.com>\r\n";
    $mime .= "To: $to\r\n";
    $mime .= "Subject: Verification Code\r\n";
    $mime .= "\r\n$message\r\n";

    $encoded_message = base64_encode($mime);
    $encoded_message = str_replace(['+', '/'], ['-', '_'], $encoded_message); // URL-safe

    $msg = new Google_Service_Gmail_Message();
    $msg->setRaw($encoded_message);

    $service->users_messages->send($user, $msg);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h2>Login</h2>
    <form action="email_verification.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <h2>Verify Code</h2>
    <form action="email_verification.php" method="POST">
        <input type="text" name="verification_code" placeholder="Enter Verification Code" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
