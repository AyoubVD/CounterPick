<?php include_once "./components/header.php" ?>
    <div class="signup-form">
        <form action="./includes/contact.inc.php" method="post">
            First Name: <input type="text" name="first_name">
            <br>
            <br>
            Last Name: <input type="text" name="last_name">
            <br>
            <br>
            Email:<input type="text" name="email">
            <br>
            <br>
            Message:<br><textarea rows="5" name="message" cols="30"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p style='color:red;'>Fill in all fields!</p>";
                }
        
                else if ($_GET["error"] == "invalidemail") {
                  echo "<p style='color:red;'>Not an email!</p>";
                } 
            }
            ?>
    </div>
    <?php include_once "./components/footer.php" ?>
</body>
</html>

