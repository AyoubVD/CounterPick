
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
<section class="signup-form">
    <h1>Create Team</h1>
    <form action="" method="POST" novalidate>
      <input type="text" id="username" name="username" spellcheck="false" placeholder="Enter your Team Name" required>
      <br>
      <br>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <br>
      <br>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
      <h2>Team goal</h2>
      <textarea rows="5" name="bio" cols="30" placeholder ="Tell us about your team"></textarea>
      <br>
      <br>
      <h2>What players do you want</h2>
      <textarea rows="5" name="looking" cols="30" placeholder ="Tell us about your team"></textarea>
      <br>
      <br>
      <input type="submit" value="Sign Up">
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
            <a href="login_team.php">Already an account <b>click here</b></a>
</section>       
<?php include_once "footer.php" ?>
</body>
</html>
