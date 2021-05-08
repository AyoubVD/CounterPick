<?php include_once "./components/header.php" ?>


<section class="signup-form">
    <h2>Log In</h2>
    <form action="./includes/login.inc.php" method="post">
     <input type="text" name="uid" placeholder="Username/Email">
     <br>
     <br>
     <input type="password" name="pwd" placeholder="password">
     <br>
     <br>
     <button type="submit" name="submit">Log In</button>
    </form>
    <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p>Username/password is wrong!</p>";
    }
}

?>
<a href="reset-password.php">Forgot your password?</a>
</section>
<br>
<a href="signup.php">Don't have an account yet?<b>click here</b></a>


<?php include_once "components/footer.php" ?>