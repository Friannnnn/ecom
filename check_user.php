<?php
session_start();
if (isset($_SESSION['user'])) {
    echo 'registered';
} else {
    echo 'not_registered';
}
?>
