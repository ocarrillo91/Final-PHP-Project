<?php
include("Header.php");
?>

<h2 class="login__title">Login</h2>
    <form action="Login.php" method="POST">
        <div class="imgcontainer">
            <img src="tender.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required />
            <label for="pword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pword" required /> 
            <!-- Invalid Credentials message goes here -->
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div class="container" style="background-color: black">
            <div class="pword"><a href="#">Forgot password?</a></div>
            <br />
            <div class="pword"><a href="Sign_up.php">Sign Up</a></div>
            <br />
            <br />
        </div>
    </form>

<?php
if ($invalidLogin) {
    echo "<script>$(document).ready(function(){
        $(\"input[name|='pword']\").after(\"<h4 style='color:red;'>Invalid Credentials!</h4>\");
    });</script>";
}
include("Footer.php");
?>