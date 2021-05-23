<?php
      include_once 'includes/init.php';
      // IF USER MAKING LOGIN REQUEST
      if(isset($_POST['email']) && isset($_POST['password'])){
        $result = $user_obj->loginUser($_POST['email'],$_POST['password']);
      }
      // IF USER ALREADY LOGGED IN
      if(isset($_SESSION['email'])){
        header('Location: profile.php');
        exit;
      }
?>
<?php include_once "./components/header.php" ?>
  <div class="main_container login_signup_container">
    <h1>Player</h1>
    <form action="login.php" method="POST">
      <input type="text" id="email" name="email" spellcheck="false" placeholder="Enter your username" required>
      <br>
      <br>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
  
      <input type="submit" value="Login">
      <br>
      <div>  
      <?php
        if(isset($result['errorMessage'])){
          echo '<p style="color:red; class="errorMsg">'.$result['errorMessage'].'</p>';
        }
        if(isset($result['successMessage'])){
          echo '<p style="color:green;" class="successMsg">'.$result['successMessage'].'</p>';
        }
      ?>    
    </div>
    </form>
  </div>
        <a href="reset-password.php">Forgot your password?<b>click here</b></a>
        <br>
        <a href="signup.php">Don't have an account yet?<b>click here</b></a>
<?php include_once "./components/footer.php" ?>
</body>
</html>