
<?php
include_once 'includes/init.php';
// IF USER MAKING SIGNUP REQUEST
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['bio'])){
  $result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password'],$_POST['bio']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: profile_team.php');
}
?>
<?php include_once "header.php" ?>
<section class="signup-form" style = "display: flex;
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
    <h1>Create Team</h1>
    <form action="" method="POST" novalidate>
      <input style="color:black;" type="text" id="username" name="username" spellcheck="false" placeholder="Enter your Team Name" required>
      <br>
      <br>
      <input style="color:black;" type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <br>
      <br>
      <input style="color:black;" type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
      <h2>Team goal</h2>
      <textarea style="color:black;" rows="5" name="bio" cols="30" placeholder ="Tell us about your team"></textarea>
      <br>
      <br>
      <h2>What players do you want</h2>
      <textarea style="color:black;" rows="5" name="looking" cols="30" placeholder ="Tell us about your team"></textarea>
      <br>
      <br>
      <input style="color:black;" type="submit" value="Sign Up">
    </form>
    <div>  
      <?php
        if(isset($result['errorMessage'])){
          echo '<p style="color:red; class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p  style="color:green;" class="successMsg">'.$result['successMessage'].'</p>';
        }       
      ?>    
    </div>
            <a style="color:white;"  href="login_team.php">Already an account <b>click here</b></a>
            <br>
            <br>
            <br>
            <?php include_once "footer.php" ?>
</section> 
<br>
<br>      

</body>
</html>
