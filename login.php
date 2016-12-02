<?php
  if(isset($_SESSION["logedUserName"])) {
    $_SESSION["username"] = $_SESSION["logedUserName"];
    $_SESSION["logedIn"] = 'loged';
  } else {
    $_SESSION["logedIn"] = 'not';
  }
  if(isset($_POST["logout"])) {
    $_SESSION["logedIn"] = 'not';
  }
?>
<div class="<?php echo $_SESSION["logedIn"] == 'loged' ? 'loged':'login-container' ?>">
<!-- <div class="login-container"> -->
  <!-- <form class="login" action="authenticate.php" method="post"> -->
  <form class="login" action="authenticate.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" placeholder="Enter username">

      <label for="pw">Password:</label>
      <input type="password" name="pw" placeholder="Enter password">
      <button type="submit" name="login">Log in</button>
  </form>
</div>

<div class="<?php echo $_SESSION["logedIn"] == 'loged' ? 'user-info':'user-info-notloged' ?>">
  Welcome <?php echo $_SESSION["username"] ?>!
  <form class="logout-form" action="index.php" method="post">
    <button type="submit" name="logout">Sign Out</button>
  </form>
</div>
