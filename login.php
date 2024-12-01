
<?php
require_once 'vendor/autoload.php';

session_start();

$googleClient = new Google_Client();
$googleClient->setClientId('320054654260-fcptfeujln15q5biepe21obl7q2bkvr3.apps.googleusercontent.com');
$googleClient->setClientSecret('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');
$googleClient->setRedirectUri('http://localhost/ecom/callback.php');
$googleClient->addScope('email');
$googleClient->addScope('profile');

if (isset($_SESSION['name'])) {
    
    header("location: profile.php");

}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <a href="<?php echo htmlspecialchars($googleClient->createAuthUrl()); ?>">Login with Google</a>
    
</body>
</html>

