<div class="<?php echo $logedIn == 'loged' ? 'loged' : 'login-container' ?>">
<!-- <div class="login-container"> -->
  <form class="login" action="<?php echo $page . '.php' ?>" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" placeholder="Enter username">

      <label for="pw">Password:</label>
      <input type="password" name="pw" placeholder="Enter password">
    <button type="submit" name="login">Log in</button>
  </form>
</div>
