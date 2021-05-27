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
    <form action="Profile_update.php" method="post" style = "display: flex; 
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
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
                        padding:50px;
                        background-image: url(https://images2.minutemediacdn.com/image/upload/c_fill,w_1200,h_630,f_auto,q_auto,g_auto/shape/cover/sport/5c2cd98abb4b87834e000001.jpeg);color:white;">
           <h1>Change bio or role or info</h1>
    <div>change bio</div><textarea style="color:black;" rows="5" type="text" name="bio"  cols="30"></textarea><br>
    <input  style="color:black;"  type="submit" name="bio_update" value="edit">
    <div>change info</div><textarea style="color:black;" rows="5" type="text" name="looking"  cols="30"></textarea><br>
    <input  style="color:black;"  type="submit" name="looking_update" value="edit">
    <div>Select your role</div>
   </select>
      <br>
      <br>
      <select style="color:black;" name="rolerank" required>
      <option value="Any">Any</option>
      <option value="top">top</option>
      <option value="jungle">jungle</option>
      <option value="mid">mid</option>
      <option value="adc">adc</option>
      <option value="support">support</option>
      </select>
      <br>
      <br>
   
   <input style="color:black;" type="submit" name="edit" value='change'>
   
</form>      
<?php include_once "./components/footer.php" ?>
</body>
</html>