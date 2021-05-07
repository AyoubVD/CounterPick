<?php  

?>


<section class="signup-form">
    <h2>Create Team</h2>
    <form action="createteam.inc.php" method="post">
     <input type="file" id="img" name="img" accept="image/*">
     <br>
     <br>
     <input type="text" name="name" placeholder="Team name">
     <br>
     <br>
     <button type="submit" name="submit">Create Team</button>
    </form>
</section>



<?php include_once "./footer.php" ?>