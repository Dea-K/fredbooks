<?php include "top.php"; ?>
<?php include "login.php"; ?>
<form class="register-book-form" action="register-submit.php" method="post">
  <div class="book-child">
    <fieldset>
      <legend>Book Information</legend>
      <label for="book-title">Title:</label>
      <input type="text" name="book-title">

      <label for="book-author">Author:</label>
      <input type="text" name="book-author">

      <label for="book-isbn">ISBN:</label>
      <input type="text" name="book-isbn" placeholder="(-) not needed">

      <label for="book-price">Price:</label>
      <input type="text" name="book-price" placeholder="(,) not needed">

      <label for="book-image">Picture:</label>
      <input id="image-upload-input" type="file" name="book-image">
    </fieldset>
    <fieldset>
      <legend>Condition</legend>
      <label for="status-condition">Condition</label>
      <input type="text" name="status-condition" placeholder="ex) Good, Bad, Okay , ...">

      <label for="status-purchased">Purchased:</label>
      <input type="date" name="status-purchased">
    </fieldset>
    <fieldset>
      <legend>Usage</legend>
      <label for="usage-major">Major:</label>
      <input type="text" name="usage-major">

      <label for="usage-course">Course:</label>
      <input type="text" name="usage-course" placeholder="Course # (e.g. CSIT207)">

      <label for="usage-instructor">Instructor:</label>
      <input type="text" name="usage-instructor">
    </fieldset>
    <button type="submit" name="register-book-button">Register!</button>
  </div>
</form>



<?php include "bottom.php" ?>
