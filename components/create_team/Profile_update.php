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
<?php
 
$servername = "ID328593_counterpick.db.webhosting.be";
$username = "ID328593_counterpick";
$password = "counterPick123";
$dbname = "ID328593_counterpick";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    $ids= $user_data->id;
    $bio=$_POST['bio'];
    $looking=$_POST['looking'];
    $select= "SELECT * from users where id='$ids'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $ids)
    {
        if(isset($_POST['bio_update']))
        {
            $update = "UPDATE users SET  bio ='$bio' where id='$ids'";
            $sql2=mysqli_query($conn,$update);
            if($sql2)
            { 
                /*Successful*/
                header('location:profile_team.php');
            }
            else
            {
                /*sorry your profile is not update*/
                
                header('location:home.php');
            }
        }
        if(isset($_POST['looking_update']))
        {
            $update = "UPDATE users SET  looking ='$looking' where id='$ids'";
            $sql2=mysqli_query($conn,$update);
            if($sql2)
            { 
                /*Successful*/
                header('location:profile_team.php');
            }
            else
            {
                /*sorry your profile is not update*/
                
                header('location:home.php');
            }
        }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:play_after_log_in.php');
    }


 ?>