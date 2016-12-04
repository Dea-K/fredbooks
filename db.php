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

  public static function CreateBook($title, $author, $isbn, $price, $userId) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      INSERT INTO Book(title, author, ISBN, price, user_id) VALUES(?, ?, ?, ?, ?)
    ");
    $sql->bind_param("ssssi", $title, $author, $isbn, $price, $userId);
    $sql->execute();
    $connection->close();
  }

  public static function UserIdByUsernameAndPassword($username, $password) {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("
      SELECT id FROM User WHERE username = ? && pw = ?
    ");
    if(!$sql->bind_param("ss", $username, $password)) {
      die("bind error");
    }
    $sql->execute();
    $sql->bind_result($userId);
    $sql->fetch();
    return $userId;
    $connection->close();
  }

}
 ?>
