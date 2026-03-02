

<?php
$host = "localhost";
$user = "secureuser";
$pass = "SecurePass123!";
$db   = "securelog";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed.");
}
?>
