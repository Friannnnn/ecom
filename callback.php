<?php
use Google\Service\Oauth2;
require_once 'vendor/autoload.php'; 

session_start();

$client = new Google_Client();
$client->setClientId('change link nalang sa production');
$client->setClientSecret('change link nalang sa production'); 
$client->setRedirectUri('http://localhost/ecom/callback.php'); 

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;
    $client->setAccessToken($token);
    $oauth = new Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    $_SESSION['email'] = $userInfo->email;
    $_SESSION['name'] = $userInfo->name;
    $_SESSION['picture'] = $userInfo->picture;

    header('Location: dashboard.php');
    exit();
} else {
    echo "No code received.";
}
?>
