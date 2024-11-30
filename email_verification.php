<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Google\Client as Google_Client;
use Google\Service\Gmail as Google_Service_Gmail;
use Google\Service\Gmail\Message as Google_Service_Gmail_Message;

require 'vendor/autoload.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Generate a verification code
    $verification_code = rand(100000, 999999);
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['email'] = $email;

    sendVerificationEmail($email, $verification_code);
    echo "Verification code sent. Check your email.";
}

function sendVerificationEmail($to, $verification_code) {
    $client = new Google_Client();
    $client->setApplicationName('Gmail API PHP');
    $client->setScopes(Google_Service_Gmail::GMAIL_SEND);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        $client->setAccessToken($_SESSION['access_token']);
    } else {
        header('Location: ' . $client->createAuthUrl());
        exit();
    }

    if ($client->isAccessTokenExpired()) {
        $refreshToken = $client->getRefreshToken();
        $client->fetchAccessTokenWithRefreshToken($refreshToken);
        $_SESSION['access_token'] = $client->getAccessToken();
    }

    $service = new Google_Service_Gmail($client);
    $user = 'me';

    $message = "Your verification code is: $verification_code";
    $mime = "From: Your Name <kaisermarkenterprise@gmail.com>\r\n";
    $mime .= "To: $to\r\n";
    $mime .= "Subject: Verification Code\r\n";
    $mime .= "\r\n$message\r\n";

    $encoded_message = base64_encode($mime);
    $encoded_message = str_replace(['+', '/'], ['-', '_'], $encoded_message);

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
    <h2>Email Verification</h2>
    <form action="email_verification.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
