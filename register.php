<?php $page = 'register' ?>

<?php include "top.php" ?>
<form class="register-form" action="index.html" method="post">
  <div class="rg-child">
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="type username">

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="type password">

    <label for="first-name">First Name:</label>
    <input type="text" name="first-name" placeholder="first name here">

    <label for="last-name">Last Name:</label>
    <input type="text" name="last-name" placeholder="last name here">

    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="example.ex@example.com">

    <label for="phone">Phone #:</label>
    <input type="text" name="phone" placeholder="000-000-0000">


    <button type="submit" name="register-submit">Submit!</button>
  </div>
</form>
<?php include "bottom.php" ?>
