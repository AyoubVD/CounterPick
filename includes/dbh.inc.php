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


