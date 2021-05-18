<?php
include("Header.php");

if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Account.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require("Mysqli_connect.php");

    $fname = mysqli_real_escape_string($dbc, trim($_POST['fname']));
    $lname = mysqli_real_escape_string($dbc, trim($_POST['lname']));
    $cname = mysqli_real_escape_string($dbc, trim($_POST['cname']));
    $country = mysqli_real_escape_string($dbc, trim($_POST['country']));
    $street = mysqli_real_escape_string($dbc, trim($_POST['street']));
    $unit = mysqli_real_escape_string($dbc, trim($_POST['unit']));
    $city = mysqli_real_escape_string($dbc, trim($_POST['city']));
    $state = mysqli_real_escape_string($dbc, trim($_POST['state']));
    $zipString = mysqli_real_escape_string($dbc, trim($_POST['zip']));
    $zip = (int)$zipString;
    $phoneString = str_replace(array('(', ')', '-', ',', '.', '/', '+'), '', mysqli_real_escape_string($dbc, trim($_POST['phone'])));
    $phone = (int)$phoneString;

    $ccnumString = str_replace(array('.', '-', ',', '/'), '', mysqli_real_escape_string($dbc, trim($_POST['ccnum'])));
    $ccnum = (int)$ccnumString;
    $exp = mysqli_real_escape_string($dbc, trim($_POST['exp']));
    $cscString = mysqli_real_escape_string($dbc, trim($_POST['csc']));
    $csc = (int)$cscString;

    $query1 = "INSERT INTO billing (user_id, first_name, last_name, company_name, country, street, unit, city, state, zip, phone) VALUES (".$_COOKIE['user_id'].", '$fname', '$lname', '$cname', '$country', '$street', '$unit', '$city', '$state', ".$zip.", ".$phone.");";
    $query2 = "INSERT INTO payment (user_id, card_number, expiration_date, card_security_code) Values (".$_COOKIE['user_id'].", ".$ccnum.", ".$exp.", ".$csc.");";
    $query3 = "DELETE FROM cart WHERE user_id=".$_COOKIE['user_id'];

    $run1 = mysqli_query($dbc, $query1);
    $run2 = mysqli_query($dbc, $query2);
    $run3 = mysqli_query($dbc, $query3);

    if ($run1 && $run2 && $run3) {
        echo "<h2 style='text-align:center;'>Order Complete!</h2>";
        echo "<br /><br />";
        echo "<h3 style='text-align:center;'>Please check your email for order receipt.</h3>";
    } else {
        echo "<h2 style='color:red;'>Error!</h2>";
        echo "<p style=\"text-align:center;\">".mysqli_error($dbc)."</p>";
    }

    mysqli_close($dbc);
} else {
    header("Refresh:0, URL=Account.php");
    exit();
}

include("Footer.php");
?>