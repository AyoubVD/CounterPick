<?php  

?>


<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="signup.inc.php" method="post">
     <input type="text" name="name" placeholder="full name">
     <input type="text" name="email" placeholder="email">
     <input type="text" name="uid" placeholder="username">
     <input type="password" name="pwd" placeholder="password">
     <input type="password" name="repeatpwd" placeholder="repeat password">
     <button type="submit" name="submit">Sign Up</button>
    </form>
</section>



<?php  
include_once "./footer.php" 
?>