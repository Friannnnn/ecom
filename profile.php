<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <p>Authenticated as <?= htmlspecialchars($_SESSION['email']); ?></p>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['name']); ?>!</h2>
    <p>Email: <?= htmlspecialchars($_SESSION['email']); ?></p>
    <p><img src="<?= htmlspecialchars($_SESSION['picture']); ?>" alt="Profile Picture"></p>

    <a href="logout.php">Logout</a>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
