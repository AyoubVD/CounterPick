<?php  

?>


<section class="signup-form">
    <h2>Log In</h2>
    <form action="login.inc.php" method="post">
     <input type="text" name="name" placeholder="Username/Email">
     <input type="password" name="pwd" placeholder="password">
     <button type="submit" name="submit">Log In</button>
    </form>
</section>



<?php  
include_once "./footer.php" 
?>