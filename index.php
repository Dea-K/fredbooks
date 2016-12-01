<?php $page = 'index'; ?>
<?php include "top.php";
      include "login.php"; ?>
  <form class="search" action="index.php" method="post">
    <input type="text" name="isbn" placeholder="ISBN, Author, Title, Course, or Instructor...">
    <button type="submit">Search</button>
  </form>
  <a id="register-button" href="register.php">Register</a>
<?php include "bottom.php"; ?>
