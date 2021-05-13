<?php include_once "./components/header.php" ?>


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
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p style='color:red;'>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p style='color:red;'>Chose a proper username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p style='color:red;'>Not an email!</p>";
                }
                else if ($_GET["error"] == "passwordnotthesame") {
                    echo "<p style='color:red;'>Password not matching!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p style='color:red;'>Username  already taken!</p>";
                }
                else if ($_GET["error"] == "Emailtaken") {
                    echo "<p style='color:red;'>Email already taken!</p>";
                }
                else if ($_GET["error"] == "none") {
                    echo "<p style='color:red;'>You have signed up!</p>";
                }
            }


            ?>
            <a href="login.php">Already an account <b>click here</b></a>
</section>       
<?php include_once "./components/footer.php" ?>
</body>
</html>