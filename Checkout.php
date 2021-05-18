<?php
if (!isset($_COOKIE['user_id'])) {
    header("Refresh:0, URL=Account.php");
    exit();
}

include("Header.php");
echo "<h1>Checkout</h1>";
echo "<br />";
?>

<form action="Confirmation.php" method="POST">
    <div class="imgcontainer">
        <img src="tender.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
        <h3 style="text-align:center;">Billing Info</h3>
        <br />
        <label for="fname"><b>First Name:</b></label>
        <input type="text" placeholder="" name="fname" required />
        <label for="lname"><b>Last Name:</b></label>
        <input type="text" placeholder="" name="lname" required />
        <label for="cname"><b>Company Name (optional):</b></label>
        <input type="text" placeholder="" name="cname" />
        <label for="country"><b>Country:</b></label>
        <input type="text" placeholder="" name="country" required />
        <label for="street"><b>Street:</b></label>
        <input type="text" placeholder="" name="street" required />
        <label for="unit"><b>Unit/Apartment/Suite (optional):</b></label>
        <input type="text" placeholder="" name="unit" />
        <label for="city"><b>City:</b></label>
        <input type="text" placeholder="" name="city" required />
        <label for="state"><b>State/Province:</b></label>
        <input type="text" placeholder="" name="state" required />
        <label for="zip"><b>Zip:</b></label>
        <input type="text" placeholder="" name="zip" required />
        <label for="phone"><b>Phone Number:</b></label>
        <input type="text" placeholder="" name="phone" required />   
        <br /><br />
        <h3 style="text-align:center;">Payment Info</h3>
        <br />
        <label for="ccnum"><b>Credit Card Number:</b></label>
        <input type="text" placeholder="" name="ccnum" required />
        <label for="exp"><b>Expiration date (Format: YYYY-MM):</b></label>
        <input type="text" placeholder="" name="exp" required />
        <label for="csc"><b>Card Security Code:</b></label>
        <input type="text" placeholder="" name="csc" required />
        <br /><br /><br /><br />
        <!-- <button type="submit">Confirm Order</button>
    </div>
</form> -->

<?php
require("Mysqli_connect.php");

$query1 = "SELECT * FROM cart WHERE user_id=".$_COOKIE['user_id'];

$run1 = mysqli_query($dbc, $query1);

$tuitionTotal = 0;

if (mysqli_num_rows($run1) != 0) {
    echo "<h3 style='text-align:center;font-size:large;'>Courses:</h3>";
    while ($row1 = mysqli_fetch_assoc($run1)) {
        $query2 = "SELECT * FROM courses WHERE course_id=".$row1['course_id'];
        $run2 = mysqli_query($dbc, $query2);

        if (mysqli_num_rows($run2) == 1) {
            $row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC);
            echo "<p style='text-align:center;font-size:large;'>Course: ".$row2['course_name']."</p>";
            echo "<p style='text-align:center;font-size:large;'>Schedule: ".$row2['schedule']."</p>";
            echo "<p style='text-align:center;font-size:large;'>Date: ".$row2['date']."</p>";
            echo "<p style='text-align:center;font-size:large;'>Price: $".$row2['tuition']."</p>";
            echo "<br />";
            $tuitionTotal += $row2['tuition'];
        } else {
            echo "<p style='color:red;'>Error</p>";
        }
    }
    echo "<h3 style='text-align:center;font-size:large;'>Total Tuition Price: $".$tuitionTotal."</h3>";
    echo "<h4 style='text-align:center;font-size:large;'><a href='./Cart.php'>Go to shopping cart</a></h4>";
} else {
    echo "<p style='text-align:center;font-size:large;'>You have nothing in your shopping cart.</p>";
    echo "<br /><br />";
    echo "<p style='text-align:center;font-size:large;'><a href='./Home.html#courses'>Go to Courses</a></p>";
}
?>
        <br /><br />
        <button type="submit">Confirm Order</button>
    </div>
</form>
<br /><br />
<?php
include("Footer.php");
?>