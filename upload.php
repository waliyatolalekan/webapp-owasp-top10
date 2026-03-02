<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Access denied.");
}

$uploadDir = "uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_FILES["file"])) {
        die("No file uploaded.");
    }

    $fileName = $_FILES["file"]["name"];
    $fileTmp  = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];

    $allowed = ['jpg','png','pdf'];
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Invalid file type.");
    }

    if ($fileSize > 2000000) {
        die("File too large.");
    }

    $newName = uniqid("file_", true) . "." . $ext;

    if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
        echo "Upload successful.";
    } else {
        echo "Upload failed.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>
