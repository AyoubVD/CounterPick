<?php
include_once 'includes/init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
    header('Location: logout.php');
    exit;
}
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<?php include_once "./components/header.php" ?>
    <form action="Profile_update.php" method="post">
           <h1>Change bio or role or status</h1>
           <h2>bio:</h2>
    <textarea rows="5" type="text" name="bio"  cols="30"></textarea><br>
    <input type="submit" name="bio_update" value="edit">
    <h2>looking for:</h2>
    <textarea rows="5" type="text" name="looking"  cols="30"></textarea><br>
    <input type="submit" name="looking_update" value="edit">

   <br>
 
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
   
   <input type="submit" name="edit" value='change'>
   
</form>      
<?php include_once "./components/footer.php" ?>
</body>
</html>