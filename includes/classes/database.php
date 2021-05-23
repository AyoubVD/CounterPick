<?php
// database.php
 class Database
 {
     public function dbConnection(){
         $db_host = "ID328593_counterpick.db.webhosting.be";
         $db_name = "ID328593_counterpick";
         $db_username = "ID328593_counterpick";
         $db_password = "counterPick123";
         
         $dsn_db = 'mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8';
         try{
            $site_db = new PDO($dsn_db, $db_username, $db_password);
            $site_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $site_db;

         }catch (PDOException $e){
            echo $e->getMessage();
            exit;
         }
     } 
 }
?>
