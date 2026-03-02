<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Access denied.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $url = $_POST['url'];

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        die("Invalid URL.");
    }

    $host = parse_url($url, PHP_URL_HOST);

    if (in_array($host, ['localhost', '127.0.0.1'])) {
        die("Blocked internal request.");
    }

    echo htmlspecialchars(file_get_contents($url));
}
?>

<form method="POST">
    <input name="url" placeholder="Enter URL">
    <button type="submit">Fetch</button>
</form>
