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
$scheduleBuilder = new ScheduleBuilder();
$scheduleBuilder->setTeams($teams);
$scheduleBuilder->setRounds((($count = count($teams)) % 2 === 0 ? $count - 1 : $count) * 2);
$scheduleBuilder->shuffle(18);
$schedule = $scheduleBuilder->build();

?>
<div class="contain"></div>
        <h1>Tournement</h1>
        <h2>Sample Full Schedule</h2>
        <h2> <?php echo date("Y/m/d")?> tournement ends in 3 months <?php echo date("Y/08/d")?></h2>
        <?php foreach($schedule as $round => $matchups){ ?>
        <h3>Round <?=$round?></h3>
        <ul>
        <?php foreach($matchups as $matchup) { ?>
            <li><?=$matchup[0] ?? '*BYE*'?> vs. <?=$matchup[1] ?? '*BYE*'?></li>
        <?php } ?>
        </ul>
        <?php } ?>
<?php include_once "./components/footer.php" ?>
</body>
</html>