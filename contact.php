<?php include_once "./components/header.php" ?>
        <div class="signup-form">
        <form action="./includes/contact.inc.php" method="post">
            First Name: <input type="text" name="first_name"><br>
            Last Name: <input type="text" name="last_name"><br>
            Email: <input type="text" name="email"><br>
            Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    </div>
</body>
</html>

<?php include_once "./components/footer.php" ?>
