<section class="signup-form">
<?php
include_once 'includes/init.php';
// IF USER MAKING SIGNUP REQUEST
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['formGender'])&& isset($_POST['rolerank'])&& isset($_POST['bio'])){
  $result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password'],$_POST['formGender'],$_POST['rolerank'],$_POST['bio']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: profile.php');
}
?>
<?php include_once "./components/header.php" ?>
    <h1>Create Player</h1>
    <form action="" method="POST" novalidate>
      <input type="text" id="username" name="username" spellcheck="false" placeholder="Enter your Player name" required>
      <br>
      <br>
      <input type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <br>
      <br>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
      <h2>Select your rank</h2>
      <select name="formGender" required>
      <option value="0">Unranked</option>
      <option value="1">Iron</option>
      <option value="2">Bronze</option>
      <option value="3">Silver</option>
      <option value="4">Gold</option>
      <option value="5">Platinum</option>
      <option value="6">Diamond</option>
      <option value="7">Master</option>
      <option value="8">Grandmaster</option>
      <option value="9">Challenger</option>
      </select>
      <br>
      <br>
      <h2>Select your role</h2>
      <select name="rolerank" required>
      <option value="Any">Any</option>
      <option value="top">top</option>
      <option value="jungle">jungle</option>
      <option value="mid">mid</option>
      <option value="adc">adc</option>
      <option value="support">support</option>
      </select>
      <br>
      <br>
      <h2>Bio</h2>
      <textarea rows="5" name="bio" cols="30" placeholder ="Tell us about yourself"></textarea>
      <br>
      <br>
      <h2>What are you looking for</h2>
      <textarea rows="5" name="looking" cols="30" placeholder ="Tell us about yourself"></textarea>
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
          echo '<p style="color:green;" class="successMsg">'.$result['successMessage'].'</p>';
        }       
      ?>    
    </div>
            <a href="login.php">Already an account <b>click here</b></a>
</section>       
<?php include_once "./components/footer.php" ?>
</body>
</html>