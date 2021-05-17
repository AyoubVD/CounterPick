<?php include_once "./components/header.php"?>
    <p>play afterlogin works page</p>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>UUID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Access Key</th>
            <th>Phone Number</th>
            <th>Activated</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>

    <?php
include_once('./includes/dbh.inc.php');
$records = mysqli_query($conn,"select * from users"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['usersId']; ?></td>
    <td><?php echo $data['userName']; ?></td>
    <td><?php echo $data['usersEmail']; ?></td>
  </tr>	
<?php
}
?>
</table>
    </tbody>
</table>
<?php include_once "./components/footer.php" ?>
</body>
</html>