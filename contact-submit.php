<?php
include "top.php";
  // contact-submit.php
  if(isset($_POST['contact-button'])) {
    $title = $_POST['contact-title'];
    $content = $_POST['contact-content'];
    include "db.php";
    DB::CreateContact($title, $content, $_SESSION['logedID']);

    header("Location: index.php");
  }
 ?>
