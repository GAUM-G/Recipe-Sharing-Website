<?php
include 'db.php';
session_start();

if (!isset($_SESSION["user_id"])) {
    die("Unauthorized");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $steps = $_POST["steps"];
    $benefits = $_POST["benefits"];
    $contents = $_POST["contents"];
    $user_id = $_SESSION["user_id"];

    $imagePath = "";
    $videoPath = "";

    if (isset($_FILES["image"])) {
        $imagePath = "uploads/" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    if (isset($_FILES["video"])) {
        $videoPath = "uploads/" . basename($_FILES["video"]["name"]);
        move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath);
    }

    $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, image, video, steps, benefits, contents) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $user_id, $title, $imagePath, $videoPath, $steps, $benefits, $contents);

    if ($stmt->execute()) {
        echo "Recipe added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
