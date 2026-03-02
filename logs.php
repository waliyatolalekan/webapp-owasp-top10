<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    die("Access denied.");
}

$search = $_GET['search'] ?? '';

$stmt = $conn->prepare("SELECT action, created_at FROM logs WHERE action LIKE ?");
$param = "%$search%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Logs</h2>

<form method="GET">
    <input name="search" placeholder="Search logs">
    <button type="submit">Search</button>
</form>

<?php while ($row = $result->fetch_assoc()): ?>
    <p><?php echo htmlspecialchars($row['action']); ?> — <?php echo $row['created_at']; ?></p>
<?php endwhile; ?>
