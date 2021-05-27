<?php include_once "./components/header.php" ?>
    <div class="signup-form" style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 50px;
                        width: 20%;
                        background-color: #FFF;
                        align-items: stretch;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        text-align: center;
                        align-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        background-image: url(https://images2.minutemediacdn.com/image/upload/c_fill,w_1200,h_630,f_auto,q_auto,g_auto/shape/cover/sport/5c2cd98abb4b87834e000001.jpeg);color:white;">
         <h1>Contact us</h1>
         <form action="./includes/contact.inc.php" method="post">
            First Name:<br> <input style="color:black;" type="text" name="first_name">
            <br>
            <br>
            Last Name:<br> <input style="color:black;" type="text" name="last_name">
            <br>
            <br>
            Email:<br><input style="color:black;"  type="text" name="email">
            <br>
            <br>
            Message:<br><textarea style="color:black;"  rows="5" name="message" cols="30"></textarea>
            <br>
            <input style="color:black;" type="submit" name="submit" value="Submit">
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

