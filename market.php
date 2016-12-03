<?php $page = 'market' ?>

<?php include "top.php" ?>
<?php include "login.php" ?>

<div class="market-container">
    <div class="drop-market-container">
      <table class="drop-market-btn">
        <tr>
          <td rowspan="2" colspan="6" class="book-image">IMAGE</td>
          <td colspan="1" class="left-border">Title</td>
          <td colspan="1" class="left-border">Class</td>
          <td colspan="1" class="left-border">Price</td>
        </tr>
        <tr class="upper-border">
          <td colspan="1" class="left-border">edition</td>
          <td colspan="1" class="left-border">Status</td>
          <td colspan="1" class="left-border">Major</td>
        </tr>
      </table>
      <div class="drop-market-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <button class="market-btn"><span>Send email</span></button>
      </div>
    </div>

</div>
<a href="register-book.php"><button class="book-register-btn">Register Book</button></a>


<?php include "bottom.php" ?>
