<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access denied.");
}

echo "<h2>Admin Panel</h2>";
echo "Only admins can see this.";
?>
