<?php include "top.php"; ?>
<?php include "login.php"; ?>
<?php include "db.php"; ?>
<?php
  // update-book.php
  if(isset($_GET['book-id'])) {
    $bookId = $_GET['book-id'];
    $bookId = intval($bookId);
    $book = DB::GetInfoByBookId($bookId);
  }

 ?>
 <form class="register-book-form" action="update-book-temp.php?book-id=<?php echo $bookId; ?>" method="post" enctype="multipart/form-data">
   <div class="book-child">
     <fieldset>
       <legend>Book Information</legend>
       <label for="update-title">Title:</label>
       <input type="text" name="update-title" value="<?php echo $book['title']; ?>">

       <label for="update-author">Author:</label>
       <input type="text" name="update-author" value="<?php echo $book['author']; ?>">

       <label for="update-isbn">ISBN:</label>
       <input type="text" name="update-isbn" placeholder="(-) not needed" value="<?php echo $book['isbn']; ?>">

       <label for="update-price">Price:</label>
       <input type="text" name="update-price" placeholder="(,) not needed" value="<?php echo $book['price']; ?>">

       <label for="update-image">Picture:</label>
       <input id="image-upload-input" type="file" name="update-image">
     </fieldset>
     <fieldset>
       <legend>Condition</legend>
       <label for="update-condition">Condition</label>
       <input type="text" name="update-condition" placeholder="ex) Good, Bad, Okay , ..."
                                                  value="<?php echo $book['condition']; ?>">

       <label for="update-purchased">Purchased:</label>
       <input type="date" name="update-purchased" value="<?php echo $book['purchased']; ?>">
     </fieldset>
     <fieldset>
       <legend>Usage</legend>
       <label for="update-major">Major:</label>
       <input type="text" name="update-major" value="<?php echo $book['major']; ?>">

       <label for="update-course">Course:</label>
       <input type="text" name="update-course" placeholder="Course # (e.g. CSIT207)"
                                               value="<?php echo $book['course']; ?>">

       <label for="update-instructor">Instructor:</label>
       <input type="text" name="update-instructor" value="<?php echo $book['instructor']; ?>">
     </fieldset>
     <button type="submit" name="update-book-button">Update!</button>
   </div>
 </form>
 <?php include "bottom.php"; ?>
