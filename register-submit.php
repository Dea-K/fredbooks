<?php include "top.php"; ?>
<?php include "login.php"; ?>
<?php include "db.php"; ?>
<?php
if(isset($_SESSION["logedUserName"]) &&
   isset($_SESSION["logedUserPassword"])) {
    $logedPW = $_SESSION["logedUserPassword"];
    $logedUN = $_SESSION["logedUserName"];
   }

if(isset($_POST["register-book-button"])) {
  $logeduserId = DB::UserIdByUsernameAndPassword($logedUN, $logedPW);
  DB::CreateBook($_POST["book-title"],
                  $_POST["book-author"],
                  $_POST["book-isbn"],
                  $_POST["book-price"],
                  $logeduserId);
  header("Location: market.php");
}
else {
  header("Location: register.php");
}


 ?>