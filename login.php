<?php
session_start();
include "db.php";
include "logger.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        log_action($conn, $user['id'], "User logged in");

        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>

<h2>Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
</form>
<a href="register.php">Register</a>
