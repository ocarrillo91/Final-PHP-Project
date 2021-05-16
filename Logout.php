<?php
if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Home.html");
    exit();
} else {
    setcookie('user_id', '', time()-3600, '/Final-PHP-Project/', '', 0, 0);
    setcookie('username', '', time()-3600, '/Final-PHP-Project/', '', 0, 0);
    $_COOKIE = array();
}
include("Header.php");

echo "<h1>Thank you for choosing Baruch Bartending School!</h1>";
echo "<br /><br />";
echo "<p style=\"text-align:center;\">You are logged out!</p>";

include("Footer.php");
?>