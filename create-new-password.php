<?php include_once "./components/header.php" ?>
<section class="section-default">
               <?php 
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your request!";
                }
                else
                {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                    <form action="./includes/reset-password.inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <input type="password" name="pwds" placeholder="Enter a new password...">
                    <input type="password" name="pwd-repeat" placeholder="repeat new password...">
                    <button type="submit" name="reset-password-submit">Reset password</button>
                    </form>                
                <?php        
                    }
                }
               ?>
                <?php
                  if (isset($_GET["newpwd"])) {
                    if ($_GET["newpwd"] == "empty") {
                        echo "<p style='color:red;'>Fill in password!</p>";
                    }
                    else if ($_GET["newpwd"] == "notsame") {
                        echo "<p style='color:red;'>Password not same!</p>";
                    }
                }
                ?>
</section>
<?php include_once "./components/footer.php" ?>
</body>
</html>