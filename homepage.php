<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
echo "Welcome, " . $_SESSION['username'] . "! You are now logged in.";
?>
