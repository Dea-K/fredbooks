<?php $page = 'contact' ?>

<?php include "top.php" ?>
<?php include "login.php" ?>
<form class="contact-form" action="contact-submit.php" method="post">
  <div class="contact-child">
    <label for="contact-title">Title:</label>
    <input type="text" name="contact-title">
    <label for="contact-content">Content:</label>
    <textarea name="contact-content" rows="8" cols="80"></textarea>
    <button type="submit" name="contact-button">Submit</button>
  </div>
</form>
<?php include "bottom.php" ?>
