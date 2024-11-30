<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

?>

<div id="content"> 
    <h2>Welcome, <?= htmlspecialchars($_SESSION['name']); ?>!</h2>
    <p>Email: <?= htmlspecialchars($_SESSION['email']); ?></p>
    <p><img src="<?= htmlspecialchars($_SESSION['picture']); ?>" alt="Profile Picture" width="150" height="150"></p>

    <a href="logout.php" class="btn btn-danger">Logout</a>
    <?php 
        if ($_SESSION['email'] == 'friangabrielmaravilla@gmail.com') {
            echo '<a href="admin/dashboard.php" class="btn btn-primary">Admin Dashboard</a>';
            
        }
    ?>
    
</div>
