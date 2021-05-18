<?php
// redirected from Login.php

if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Login.php");
    exit();
}

include("Header.php");

echo "<h1 style='text-align:center;'>Welcome, ".$_COOKIE['username']."!</h1>";
echo "<br />";
echo "<p style='text-align:center;font-size:large;'>You are logged in!</p>";
echo "<br /><br />";
echo "<h3 style='text-align:center;'><a href='./Cart.php'>Shopping Cart</a></h3>";
echo "<br /><br />";
echo "<h3 style='text-align:center;'><a href='./Checkout.php'>Proceed to Checkout</a></h3>";
echo "<br /><br />";

require("Mysqli_connect.php");

$query1 = "SELECT user_id, username, email FROM account WHERE user_id=".$_COOKIE['user_id'];
$run1 = mysqli_query($dbc, $query1);

if (mysqli_num_rows($run1) == 1) {
    $row = mysqli_fetch_array($run1, MYSQLI_ASSOC);
    echo "<p style='text-align:center;font-size:large;'>Username: ".$row['username']."</p>";
    echo "<p style='text-align:center;font-size:large;'>Email: ".$row['email']."</p>";
} else {
    echo "<p style='color:red;'>Error!</p>";
}

mysqli_close($dbc);


echo "<p style='text-align:center;'><a href=\"Logout.php\">Logout</a></p>";

include("Footer.php");
?>