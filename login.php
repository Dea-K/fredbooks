<?php
  if(isset($_SESSION["logedUserName"])) {
    $_SESSION["username"] = $_SESSION["logedUserName"];
    $_SESSION["logedIn"] = 'loged';
  } else {
    $_SESSION["logedIn"] = 'not';
  }
?>
<div class="<?php echo $_SESSION["logedIn"] == 'loged' ? 'loged' : 'login-container' ?>">
<!-- <div class="login-container"> -->
  <form class="login" action="authenticate.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" placeholder="Enter username">

      <label for="pw">Password:</label>
      <input type="password" name="pw" placeholder="Enter password">
      <button type="submit" name="login">Log in</button>
  </form>
</div>
