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
  <div class="main_container login_signup_container"  style = "display: flex; 
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
    
    <form action="login.php" method="POST">
    <h1>Player</h1>
      <input type="text" id="email" name="email" spellcheck="false" placeholder="Enter your username" required>
      <br>
      <br>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
  
      <input style="color:black;" type="submit" value="Login">
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