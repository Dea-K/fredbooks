<?php
  // delete-book.php
  include "db.php";
  if(isset($_GET['book-id'])) {
    $bookId = $_GET['book-id'];
    $bookId = intval($bookId);
    DB::DeleteBookByBookId($bookId);
    header("Location: market.php");
  }
?>
