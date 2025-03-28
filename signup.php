<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['gmail']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Debugging: Check if values are received
    echo "Received Data: <br>";
    echo "Name: $name <br>";
    echo "Username: $username <br>";
    echo "Phone: $phone <br>";
    echo "Email: $email <br>";
    echo "Password (Hashed): $password <br>";

    // Insert into database
    $sql = "INSERT INTO users (name, username, phone, email, password) VALUES ('$name', '$username', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sign up successful!'); window.location.href = 'homepage.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
