<?php $page = 'register' ?>
<?php include "db.php";
  if(isset($_POST['register-submit'])) {
    DB::CreateUser(
      $_POST['username'],
      $_POST['password'],
      $_POST['first-name'],
      $_POST['last-name'],
      $_POST['email'],
      $_POST['phone']
    );
    header('Location: index.php');
  }
?>

<?php include "top.php" ?>
<form class="register-form" method="post">
  <div class="rg-child">
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Type Username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Type Password" required>

    <label for="first-name">First Name:</label>
    <input type="text" name="first-name" placeholder="Your First Name" required>

    <label for="last-name">Last Name:</label>
    <input type="text" name="last-name" placeholder="Your Last Name" required>

    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="example.ex@example.com" required>

    <label for="phone">Phone #:</label>
    <input type="text" name="phone" placeholder="000-000-0000" required>


    <button type="submit" name="register-submit">Register</button>
  </div>
</form>
<?php include "bottom.php" ?>
