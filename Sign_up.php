<?php
include("Header.php");
?>

<h2>Sign Up</h2>

<form action="./Register.php" method="POST">
  <div class="imgcontainer">
    <img src="tini.jpeg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="uname" required />

    <label for="email"><b>Email/b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required />

    <label for="pword"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pword" id="pword" required />
        
    <button type="submit">Sign Up</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>

<?php
include("Footer.php");
?>