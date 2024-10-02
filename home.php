<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="content">
        <h1>Welcome To Kaisermark Powertools!</h1>
        <p>Welcome, <?= htmlspecialchars($_SESSION['name']); ?>!</p>
    </div>
</body>
</html>