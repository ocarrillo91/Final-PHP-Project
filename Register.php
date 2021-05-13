<?php
include("Header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("Mysqli_connect.php");

    $uname = mysqli_real_escape_string($dbc, $_POST['uname']);
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $pword = mysqli_real_escape_string($dbc, $_POST['pword']);

    $query = "INSERT INTO account (username, email, password) VALUES ('$uname', '$email', SHA1('$pword'))";
    $run = mysqli_query($dbc, $query);

    if ($run) {
        echo "<h2>Registration Complete!</h2>";
        header("Refresh:5, URL=Login.php");
    } else {
        echo "<h2>Registration Error!</h2>";
        echo "<p>".mysqli_error($dbc)."</p>";
        header("Refresh:5, URL=Sign_up.php");
    }

    mysqli_close($dbc);
} else {
    echo "<h1>Please register from the Sign Up page!</h1>";
    header("Refresh:5, URL=Sign_up.php");

}

include("Footer.php");
?>