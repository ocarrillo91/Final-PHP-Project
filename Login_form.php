<?php

// Users shouldn't be accessing this file
// Make sure this file's name matches $logFormFile

$logFormFile = "Login_form.php";

// if user tries to access this file, redirect to Login.php
if (strpos($_SERVER['REQUEST_URI'], $logFormFile) !== false) {
    header("Refresh:0, URL=Login.php");
}
?>

<h2>Login </h2>

<form action="/Login.php" method="post">
  <div class="imgcontainer">
    <img src="tini.jpeg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="pword"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pword" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="#">Forgot password?</a></span>
    <span><a href="./Sign_up.php"> | Sign up |</a></span>
  </div>
</form>