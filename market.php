<?php $page = 'market' ?>

<?php include "top.php" ?>
<?php include "login.php" ?>

<div class="market-container">
    <?php
      include "db.php";
      $books = DB::GetAllBooks();
      foreach ($books as $book) {
        echo '
        <div class="drop-market-container">
          <table class="drop-market-btn">
            <tr>
              <td rowspan="2">
                <img class="book-image" src="data:image/jpg;base,' . $book['image'] . '"/>
              </td>
              <td class="left-border">' . $book['title'] . '</td>
              <td class="left-border">' . $book['course'] . '</td>
              <td class="left-border">$ ' . $book['price'] . '</td>
            </tr>
            <tr class="upper-border">
              <td class="left-border">' . $book['condition'] . '</td>
              <td class="left-border">' . $book['purchased'] . '</td>
              <td class="left-border">' . $book['major'] . '</td>
            </tr>
          </table>
          <div class="drop-market-content">
              <table class="book-table">
                <tr>
                  <td>Title:</td>
                  <td>' . $book['title'] . '</td>
                </tr>
                <tr>
                  <td>Author:</td>
                  <td>' . $book['author'] . '</td>
                </tr>
                <tr>
                  <td>ISBN:</td>
                  <td>' . $book['ISBN'] . '</td>
                </tr>
                <tr>
                  <td>Price:</td>
                  <td>$ ' . $book['price'] . '</td>
                </tr>
              </table>
              <table class="book-status-table">
                <tr>
                  <td>Purchased:</td>
                  <td>' . $book['purchased'] . '</td>
                </tr>
                <tr>
                  <td>Condition:</td>
                  <td>' . $book['condition'] . '</td>
                </tr>
              </table>
              <table class="usage-table">
                <tr>
                  <td>Major:</td>
                  <td>' . $book['major'] . '</td>
                </tr>
                <tr>
                  <td>Course #:</td>
                  <td>' . $book['course'] . '</td>
                </tr>
                <tr>
                  <td>Instructor:</td>
                  <td>' . $book['instructor'] . '</td>
                </tr>
              </table>
              '; if($book['user_id'] == $_SESSION["logedID"]) {
                echo '<a href="delete-book.php?book-id=' . $book['id'] . '"><button class="loged-delete">DELETE</button></a>';
              } echo '
              <button class="market-btn">
                <span>Send email</span>
              </button>
          </div>
        </div>
        ';
      }
    ?>

</div>
<a href="register-book.php"><button class="book-register-btn">Register Book</button></a>


<?php include "bottom.php" ?>
