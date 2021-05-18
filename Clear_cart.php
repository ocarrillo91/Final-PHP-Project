<?php
if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Account.php");
    exit();
}

require("Mysqli_connect.php");

$query = "DELETE FROM cart WHERE user_id=".$_COOKIE['user_id'];

$run = mysqli_query($dbc, $query);

if ($run) {
    header("Refresh:0, URL=Cart.php");
} else {
    echo "<p style='color:red;'>Error!</p>";
}
?>