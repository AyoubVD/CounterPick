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
include_once './src/round-robin.php';
include_once './etc/dbh.inc.php';
$records = mysqli_query($conn,"select teamname from users where team_or_player = 'team'"); // fetch data from database
$teams = array();
while($data  = $records->fetch_assoc())

{
    $teams[] = $data['teamname'];

}


?>

<?php
// connect to database


$servername = "ID328593_counterpick.db.webhosting.be";
$username = "ID328593_counterpick";
$password = "counterPick123";
$dbname = "ID328593_counterpick";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }



// define how many results you want per page
$results_per_page = 10;

// find out the number of results stored in database
$sql='SELECT * FROM users';
$result = mysqli_query($con, $sql);
$number_of_results = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql='SELECT * FROM users LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {
  echo $row['id'] . ' ' . $row['teamname']. '<br>';
}

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
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
        <footer style="color:white;">
    <a style="color:white;" href="https://counterpick123.wordpress.com/">About us</a>
    <a style="color:white;" href="#">Teaser</a>
    <br>
    © 2021 - Counterpick - Thomas More
</footer>
</body>
</html>