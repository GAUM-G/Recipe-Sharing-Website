<?php
session_start(); // Start session
include "db.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = trim($_POST['username']); 
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Username and password cannot be empty!";
        exit();
    }

    // Query to find user by username
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // Store session
            header("Location: homepage.html"); // Instant redirect
            exit(); // Stop script execution
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>
