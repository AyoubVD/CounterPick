<?php include_once "./components/header.php" ?>
        
<?php
if (isset($_GET["error"])) {
   if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }
    if ($_GET["error"] == "emptypassword") {
        echo "<p>Failed to create no input!</p>";
    }
    if ($_GET["error"] == "passwordnotsame") {
        echo "<p>Failed to create password not the same!</p>";
    }
}

if (isset($_GET["reset"])) {
    if($_GET["reset"] == "success"){
        echo '<p class="signupsuccess">Check your e-mail!(check spam) </p>';
    }
}
if (isset($_GET["newpwd"])) {
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p class="signupsuccess">Your password has been reset!</p>';
    }
}
if (isset($_GET["log"])) {
    if ($_GET["log"] == "out") {
        echo '<p class="signupsuccess">You have been logged out!</p>';
    }
}
if (isset($_GET["log"])) {
    if ($_GET["log"] == "in") {
        echo '<p class="signupsuccess">You have been logged in!</p>';
    }
}
?>
   </div>
        
        <?php include_once "./components/footer.php" ?>
    </div>
</body>
</html>