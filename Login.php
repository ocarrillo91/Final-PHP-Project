<?php
$invalidLogin = false;

if (isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Account.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require("Mysqli_connect.php");

    $uVal = mysqli_real_escape_string($dbc, trim($_POST['uname']));
    $pVal = mysqli_real_escape_string($dbc, trim($_POST['pword']));

    // query to check if credentials exist in database
    $query = "SELECT user_id, username FROM account WHERE username='$uVal' AND password=SHA1('$pVal')";

    // use @mysqli_query() to surpress error msgs
    $run = @mysqli_query($dbc, $query);

    if (mysqli_num_rows($run) == 1) {
        $row = mysqli_fetch_array($run, MYSQLI_ASSOC);
        // set cookie and redirect to loggedin page
        setcookie('user_id', $row['user_id']);
        setcookie('username', $row['username']);
        header("Refresh:0, URL=Account.php");
        exit();
    } else {
        // invalid login, add javascript to show invalid login msg
        $invalidLogin = true;
    }

    mysqli_close($dbc);
}

// building the login page
include("Login_form.php");
?>