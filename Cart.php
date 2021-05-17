<?php
if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Account.php");
    exit();
}
include("Header.php");

require("Mysqli_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sVal = mysqli_real_escape_string($dbc, trim($_POST['schedule']));
    $dVal = mysqli_real_escape_string($dbc, trim($_POST['Date']));
    $cVal = mysqli_real_escape_string($dbc, trim($_POST['bartendingcourse']));

    $query1 = "SELECT course_id FROM courses WHERE course_name='$cVal' AND schedule='$sVal' AND date='$dVal'";

    // use @mysqli_query() to surpress error msgs
    $run1 = mysqli_query($dbc, $query1);

    if (mysqli_num_rows($run1) == 1) {
        $row1 = mysqli_fetch_array($run1, MYSQLI_ASSOC);

        $query2 = "INSERT INTO cart (user_id, course_id) VALUES (".$_COOKIE['user_id'].", ".$row1['course_id'].")";

        $run2 = mysqli_query($dbc, $query2);

        if ($run2) {
            echo "<h1>Added to Cart!</h1>";
            header("Refresh:5, URL=Cart.php");
            exit();
        } else {
            echo "<p style='color:red;'>Error</p>";
        }
    } else {
        echo "<p style='color:red;'>Error</p>";
    }
} else {
    echo "<h1>Your Shopping Cart</h1>";
    echo "<br />";

    $query3 = "SELECT * FROM cart WHERE user_id=".$_COOKIE['user_id'];

    $run3 = mysqli_query($dbc, $query3);

    if (mysqli_num_rows($run3) != 0) {
        while ($row3 = mysqli_fetch_assoc($run3)) {
            $query4 = "SELECT * FROM courses WHERE course_id=".$row3['course_id'];
            $run4 = mysqli_query($dbc, $query4);

            if (mysqli_num_rows($run4) == 1) {
                $row4 = mysqli_fetch_array($run4, MYSQLI_ASSOC);
                echo "<p style='text-align:center;font-size:large;'>Course: ".$row4['course_name']."</p>";
                echo "<p style='text-align:center;font-size:large;'>Schedule: ".$row4['schedule']."</p>";
                echo "<p style='text-align:center;font-size:large;'>Date: ".$row4['date']."</p>";
                echo "<br />";
            } else {
                echo "<p style='color:red;'>Error</p>";
            }
        }
        echo "<h3 style='text-align:center;font-size:large;'><a href='./Checkout.php'>Proceed to Checkout</a></h3>";
    } else {
        echo "<p style='text-align:center;font-size:large;'>You have nothing in your shopping cart.</p>";
    }
}
mysqli_close($dbc);
include("Footer.php");
?>