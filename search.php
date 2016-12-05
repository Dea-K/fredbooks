<?php
  include "top.php";
  include "login.php";
  include "db.php";
  // search.php
  ?>
  <div class="market-container">
  <?php
  if(isset($_POST['search'])) {
    $bookId = DB::SearchBookIdByTitle($_POST['search-title']);
    $book = DB::GetInfoByBookId(intval($bookId));
      echo '
      <div class="drop-market-container">
        <table class="drop-market-btn">
          <tr>
            <td rowspan="2">
              <img class="book-image" src="https://upload.wikimedia.org/wikipedia/commons/6/63/Textbook.JPG"/>
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
                <td>' . $book['isbn'] . '</td>
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
            '; if(intval($book['user_id']) == intval($_SESSION["logedID"])) {
              echo '<a href="delete-book.php?book-id=' . $book['id'] . '"><button class="loged-delete">DELETE</button></a>';
              echo '<a href="update-book.php?book-id=' . $book['id'] . '"><button class="loged-delete">UPDATE</button></a>';
            } echo '
            <button class="market-btn" disabled>
              <span>Send email</span>
            </button>
        </div>
      </div>
      ';

  }
 ?>
 </div>
 <?php include "bottom.php"; ?>
