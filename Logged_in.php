<?php
// redirected from Login.php

if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Login.php");
    exit();
}

include("Header.php");

echo "<h1 style=\"text-align:center;\">Welcome, ".$_COOKIE['username']."!</h1>";
echo "<br />";
echo "<p style=\"text-align:center;\">You are logged in!</p>";
echo "<br /><br />";
echo "<p style=\"text-align:center;\"><a href=\"Logout.php\">Logout</a></p>";

include("Footer.php");
?>