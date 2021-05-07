<?php 
    function connectToDb() {
        $host = "ID328593_counterpick.db.webhosting.be";
        $user = "ID328593_counterpick";
        $password = "counterPick123";
        $database = "ID328593_counterpick";
        
        $conn = mysqli_connect($host, $user, $password, $database);
        if ($conn == false) die("Failed to connect to database!");
        return $conn;
    }


    function closeConnection($conn) {
        $conn->close();
    }

    function getQuery($sql) {
        $conn = connectToDb();
        $result = mysqli_query($conn,$sql);
        closeConnection($conn);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function createQuery($sql) {
        $conn = connectToDb();
        $result = mysqli_query($conn,$sql);
        closeConnection($conn);
        return $result;
    }

    function updateQuery($sql) {
        $conn = connectToDb();
        $result = mysqli_query($conn,$sql);
        closeConnection($conn);
        return $result;
    }


$servername = "ID328593_counterpick.db.webhosting.be";
$username = "ID328593_counterpick";
$password = "counterPick123";
$dbname = "ID328593_counterpickr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

return $conn;

  