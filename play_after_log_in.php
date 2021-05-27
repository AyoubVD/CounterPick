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
$query = "SELECT teamname FROM users where team_or_player = 'team' LIMIT " . $page_first_result . ',' . $results_per_page ;  
$result = mysqli_query($conn, $query);  
$teams = array();
//display the retrieved result on the webpage  
while ($row = mysqli_fetch_array($result)) {   
     $teams[] = $row['teamname'];


}  
include_once './src/round-robin.php';
include_once './etc/dbh.inc.php'; 

$scheduleBuilder = new ScheduleBuilder();
$scheduleBuilder->setTeams($teams);
$scheduleBuilder->setRounds(6);
$scheduleBuilder->shuffle(18);
$schedule = $scheduleBuilder->build();
echo '<p>Select page</p>';
//display the link of the pages in URL  
for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<a href = "play_after_log_in.php?page=' . $page . '">' . $page . ' </a>';  
}  


?>
<div class="contain" style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 5px;
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
                        background-image: url(https://lolstatic-a.akamaihd.net/frontpage/apps/prod/clash-2018/en_GB/a46e742ae82f9d4f9db8e34ba57873e513e727b7/assets/static/img/backgrounds/brackets-bg.jpg);color:white;">
        <h1>Tournement</h1>
        <br>
        <h1>How to play?</h1>
        <h2>Read this first!:</h2>
        <br>
        <h2><a style="color:white;" href='rules.php'><u>Rules</u></a></h2>
        <h2> <?php echo date("Y/m/d")?> tournement ends in 3 months <?php echo date("Y/08/d")?></h2>
        <?php foreach($schedule as $round => $matchups){ ?>
        <h3>Round <?=$round?></h3><br>
        <ul>
        <?php foreach($matchups as $matchup) { ?>
            <li><?=$matchup[0] ?? '*NO OPPONENT*'?> vs. <?=$matchup[1] ?? '*NO OPPONENT*'?></li>
        <?php } ?>
        </ul>
        <?php } ?>
        </div>
        <?php 
        //display the link of the pages in URL  
for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<a style="color:white;" href = "play_after_log_in.php?page=' . $page . '">' . $page . ' </a>';  
}  
echo '<p style="color:white;" >Select page</p>';

?>

        <footer style="color:white;">
    <a style="color:white;" href="https://counterpick123.wordpress.com/">About us</a>
    <a style="color:white;" href="#">Teaser</a>
    <br>
    © 2021 - Counterpick - Thomas More
</footer>
</body>
</html>