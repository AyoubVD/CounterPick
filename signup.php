
<?php
include_once 'includes/init.php';
// IF USER MAKING SIGNUP REQUEST
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['formGender'])&& isset($_POST['rolerank'])&& isset($_POST['bio']) && isset($_POST['region']) ){
  $result = $user_obj->singUpUser($_POST['username'],$_POST['email'],$_POST['password'],$_POST['formGender'],$_POST['rolerank'],$_POST['bio'],$_POST['region']);
}
// IF USER ALREADY LOGGED IN
if(isset($_SESSION['email'])){
  header('Location: profile.php');
}
?>
<?php include_once "./components/header.php" ?>
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
    <h1>Create Player</h1>
    <form action="" method="POST" novalidate>
      <input style="color:black;" type="text" id="username" name="username" spellcheck="false" placeholder="Enter your Player name" required>
      <br>
      <br>
      <input style="color:black;" type="email" id="email" name="email" spellcheck="false" placeholder="Enter your email address" required>
      <br>
      <br>
      <input style="color:black;" type="password" id="password" name="password" placeholder="Enter your password" required>
      <br>
      <br>
      <h2>Select your REGION</h2>
      <select name="region" required style="color:black;">
      <option value="EUNE">EUNE</option>
      <option value="TR">TURKEY</option>
      <option value="EUW">EUW</option>
      </select>
      <br>
      <br>
      <h2>Select your rank</h2>
      <select name="formGender" required style="color:black;">
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
      <select name="rolerank" required style="color:black;">
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
      <textarea style="color:black;" rows="5" name="bio" cols="30" placeholder ="Tell us about yourself"></textarea>
      <br>
      <br>
      <h2>What are you looking for</h2>
      <textarea style="color:black;" rows="5" name="looking" cols="30" placeholder ="Tell us about yourself"></textarea>
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
          echo '<p style="color:green;" class="successMsg">'.$result['successMessage'].'</p>';
        }       
      ?>    
    </div>
            <a style="color:white;"href="login.php">Already an account <b>click here</b></a>
            <br>
            <br>
            <?php include_once "./components/footer.php" ?>
</section>       

</body>
</html>

