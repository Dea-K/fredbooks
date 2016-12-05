<?php
  // send-mail.php
  include "top.php";
  include "login.php";
  include "db.php";
  if(isset($_GET['book-id'])) {
    $bookId = $_GET['book-id'];
    $userId = DB::GetUserIdByBookId($bookId);
    $receivingEmail = DB::GetEmailByUserId($userId);

    $sendingEmail = DB::GetEmailByUserId($_SESSION['logedID']);
    mail($receivingEmail, $sendingEmail, "", "");

    header("Location: index.php");
  }
 ?>
