<?php include_once "./components/header.php"?>
        <div id="content">
        <section class="signup-form">
            <h2>Create Team</h2>
            <form action="./includes/createteam.inc.php" method="post" text-align: center;>
            <input style="display:inline;text-align:center;" type="file" id="img" name="img" accept="image/*">
            <br>
            <br>
            <input type="text" name="name" placeholder="Team name">
            <br>
            <br>
            <button type="submit" name="submit">Create Team</button>
            </form>
        </section>
        </div>
<?php include_once "./components/footer.php" ?>
</body>
</html>