<?php
function log_action($conn, $user_id, $action) {
 $query = "INSERT INTO logs (user_id, action) VALUES ('$user_id', '$action')";
  mysqli_query($conn, $query);
}
?>
