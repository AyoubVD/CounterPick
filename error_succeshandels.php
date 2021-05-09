<?php include_once "./components/header.php" ?>
        
<?php
if (isset($_GET["error"])) {
   if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }
}

if (isset($_GET["reset"])) {
    if($_GET["reset"] == "success"){
        echo '<p class="signupsuccess">Check your e-mail! </p>';
    }
}
if (isset($_GET["newpwd"])) {
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p class="signupsuccess">Your password has been reset!</p>';
    }
}
?>
   </div>
        
        <?php include_once "./components/footer.php" ?>
    </div>
</body>
</html>