<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<h2>SecureLog Dashboard</h2>

<a href="logs.php">Logs</a><br>
<a href="upload.php">Upload</a><br>
<a href="fetch.php">URL Fetch</a><br>

<?php if ($_SESSION['role'] === 'admin'): ?>
<a href="admin.php">Admin Panel</a><br>
<?php endif; ?>

<a href="logout.php">Logout</a>
