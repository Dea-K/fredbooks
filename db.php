<?php
// db.php for fredbooks website

class DB{
  public static function CreateConnection() {
    $connection = new mysqli('fredonia-207.ctq8nkxhifvb.us-west-2.rds.amazonaws.com',
     'lee',
      'UHD113r',
       'final_lee01');
    if($connection->connect_error) {
      echo "Connection error: " . $connection->connect_error;
    }
    return $connection;
  }

  public static function CreateUser($username, $pw, $first, $last, $email, $phone) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
    INSERT INTO User (username, pw, firstName, lastName, email, phone) VALUES (?, ?, ?, ?, ?, ?)
    ");
    $sql->bind_param("ssssss", $username, $pw, $first, $last, $email, $phone);
    $sql->execute();
    $connection->close();
  }



}
 ?>
