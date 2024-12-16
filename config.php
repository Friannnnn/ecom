<?php
// config.php
$conn = new mysqli('localhost', 'root', '', 'dbecom');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>