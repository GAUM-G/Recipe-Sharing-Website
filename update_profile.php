<?php
session_start();
include 'db.php'; // Ensure this file connects to your MySQL database

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $data['username'];
$fullName = $data['fullName'];
$email = $data['email'];
$phone = $data['phone'];
$bio = $data['bio'];

// Validate username uniqueness
$checkQuery = $conn->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
$checkQuery->bind_param("si", $username, $user_id);
$checkQuery->execute();
$result = $checkQuery->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Username already taken"]);
    exit();
}

// Update user profile
$query = $conn->prepare("UPDATE users SET username = ?, full_name = ?, email = ?, phone = ?, bio = ? WHERE id = ?");
$query->bind_param("sssssi", $username, $fullName, $email, $phone, $bio, $user_id);

if ($query->execute()) {
    echo json_encode(["success" => true, "message" => "Profile updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update profile"]);
}

$conn->close();
?>
