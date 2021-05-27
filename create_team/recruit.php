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
<?php include_once "header.php" ?>
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
  
//define total number of results you want per page  
$results_per_page = 5;  

//find the total number of results stored in the database  
$query = "select *from users where team_or_player = 'team'";  
$result = mysqli_query($conn, $query);  
$number_of_result = mysqli_num_rows($result);  

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page;  

//retrieve the selected results from database   
$query = "SELECT * FROM users where team_or_player = 'player' LIMIT " . $page_first_result . ',' . $results_per_page ;  
$result = mysqli_query($conn, $query);  
$teams = array();
//display the retrieved result on the webpage

?>
<h3>All Teams</h3> 

<?php 
echo '<p>Select page</p>';
//display the link of the pages in URL  
for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<a href = "recruit.php?page=' . $page . '">' . $page . ' </a>';  
}  

while ($row = mysqli_fetch_array($result)) {   
     
        
    echo '<div class="user_box" 
    style = "display: flex;
    flex-wrap: wrap;
    align-items: center;
    border: 1px solid rgba(23,23,23, .2);
    margin: 5px;
    padding: 5px;
    width: 50%;
    background-color: #FFF;
    align-items: stretch;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    text-align: center;
    align-content: center;
    margin-left: auto;
    margin-right: auto;
    background-image: url(https://i.pinimg.com/736x/c1/7f/31/c17f318095085ff32bb7fadbb1f9a89a.jpg);color:white;"
    >        <h2><span><a style="color:white;"href="user_profile.php?id='.$row['id'].'" class="see_profileBtn">invite player</a></h2>
            <div class="user_img"><img width="48" height="48" style="border-radius: 50%;" src="profile_images/'.$row['user_image'].'" alt="Profile image"></div>
            <h3>Player:<div class="user_info"><span>'.$row['username'].'</span></h3>
            <h3 style="width: 40%;" >looking for:<div class="user_info"><span>'.$row['looking'].'</span></h3>
        </div>';
}  

echo '<p>Select page</p>';
//display the link of the pages in URL  
for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<a href = "recruit.php?page=' . $page . '">' . $page . ' </a>';  
}  


?>
<?php include_once "footer.php" ?>
</body>
</html>