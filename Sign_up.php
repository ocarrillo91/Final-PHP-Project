<?php
include("Header.php");
?>

<h2 class="login__title">Sign Up</h2>
    <form action="Register.php" method="POST">
        <div class="imgcontainer">
            <img src="tender.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required />
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required />
            <label for="pword"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pword" required /> 
            <button type="submit">Sign Up</button>
        </div>
        <div class="container" style="background-color: black">
            <div class="pword"><a href="Home.html">Return to Home Page</a></div>
            <br />
            <br />
        </div>
    </form>

<?php
include("Footer.php");
?>