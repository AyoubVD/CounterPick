<?php 
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}
?>


<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="./includes/signup.inc.php" method="post">
     <input type="text" name="name" placeholder="full name">
     <br>
     <br>
     <input type="text" name="email" placeholder="email">
     <br>
     <br>
     <input type="text" name="uid" placeholder="username">
     <br>
     <br>
     <input type="password" name="pwd" placeholder="password">
     <br>
     <br>
     <input type="password" name="repeatpwd" placeholder="repeat password">
     <br>
     <br>
     <button type="submit" name="submit">Sign Up</button>
     <br>
     <br>
    </form>
</section>
<a href="login.php">Already an account <b>click here</b></a>



<?php  
include_once "./footer.php" 
?>