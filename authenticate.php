<?php
include "top.php";
// authenticate.php

$username = $_POST["username"];
$password = $_POST["pw"];

include "db.php";
$connection = DB::CreateConnection();

$sql = $connection->prepare(
  "SELECT username, pw, id FROM User WHERE username = ?"
);

$sql->bind_param("s", $username);
$sql->execute();
$sql->bind_result($foundName, $foundPassword, $foundId);
$sql->fetch();
if($foundName == $username) {
  if($foundPassword == $password) {
    $_SESSION["logedUserName"] = $foundName;
    $_SESSION["logedUserPassword"] = $foundPassword;
    $_SESSION["logedID"] = $foundId;
    header("Location: index.php");
  }
  else {
    session_destroy();
    header("Location: index.php");
  }
} else {
  session_destroy();
  header("Location: index.php");
}
 ?>
