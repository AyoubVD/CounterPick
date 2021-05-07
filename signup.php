<?php  

?>


<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="signup.inc.php" method="post">
     <input type="text" name="name" placeholder="full name">
     <br>
     <input type="text" name="email" placeholder="email">
     <br>
     <input type="text" name="uid" placeholder="username">
     <br>
     <input type="password" name="pwd" placeholder="password">
     <br>
     <input type="password" name="repeatpwd" placeholder="repeat password">
     <br>
     <button type="submit" name="submit">Sign Up</button>
     <br>
    </form>
</section>



<?php  
include_once "./footer.php" 
?>