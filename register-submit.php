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
  $_SESSION["logedID"] = DB::UserIdByUsernameAndPassword($logedUN, $logedPW);

        $image = addslashes($_FILES['book-image']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);

  DB::CreateBook($_POST["book-title"],
                  $_POST["book-author"],
                  $_POST["book-isbn"],
                  $_POST["book-price"],
                  $_SESSION["logedID"],
                  $image);
  $bookId = DB::GetBookId($_POST["book-title"],
                          $_POST["book-author"],
                          $_POST["book-isbn"],
                          $_POST["book-price"],
                          $_SESSION["logedID"]);
  DB::CreateBookStatus($bookId, $_POST["status-purchased"], $_POST["status-condition"]);
  DB::CreateUsage($bookId, $_POST["usage-major"], $_POST["usage-course"], $_POST["usage-instructor"]);
  // TODO proper redirect
  header("Location: market.php");
}
else {
  header("Location: register.php");
}


 ?>
