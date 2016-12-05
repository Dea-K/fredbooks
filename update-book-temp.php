<?php
  // update-book-temp.php
  include "db.php";
  if(isset($_POST['update-book-button'])) {
    DB::UpdateBookByBookId(
      $_POST['update-title'],
      $_POST['update-author'],
      $_POST['update-isbn'],
      $_POST['update-price'],
      $_POST['update-condition'],
      $_POST['update-purchased'],
      $_POST['update-major'],
      $_POST['update-course'],
      $_POST['update-instructor'],
      intval($_GET['book-id'])
    );
    header("Location: market.php");
  }
 ?>
