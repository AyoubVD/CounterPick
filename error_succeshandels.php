<?php include_once "./components/header.php" ?>
        
<?php
if (isset($_GET["error"])) {
   if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }
}


?>
   </div>
        
        <?php include_once "./components/footer.php" ?>
    </div>
</body>
</html>