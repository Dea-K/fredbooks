<?php
// db.php for fredbooks website

$host = 'fredonia-207.ctq8nkxhifvb.us-west-2.rds.amazonaws.com';
$user = 'lee';
$pass = 'UHD113r';
$db = 'final_lee01';

class DB{

  public static function CreateConnection() {
    $connection = new mysqli($host, $user, $pass, $db);
    if($connection->connect_error) {
      echo "Connection error: " . $connection->connect_error;
    }
    return $connection;
  }



}
 ?>
