
<?php
require_once 'vendor/autoload.php';

session_start();

$googleClient = new Google_Client();
$googleClient->setClientId('change link nalang sa production');
$googleClient->setClientSecret('change link nalang sa production');
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

