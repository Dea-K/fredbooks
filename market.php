<?php $page = 'market' ?>

<?php include "top.php" ?>
<?php include "login.php" ?>

<div class="market-container">
    <div class="drop-market-container">
      <table class="drop-market-btn" border="1">
        <tr>
          <td rowspan="2" colspan="6" class="book-image">IMAGE</td>
          <td colspan="1">Title</td>
          <td colspan="1">Class</td>
          <td colspan="1">Price</td>
        </tr>
        <tr>
          <td colspan="1">edition</td>
          <td colspan="1">Status</td>
          <td colspan="1">Major</td>
        </tr>
      </table>
      <div class="drop-market-content">
          <p>list1</p><p>list1</p>
          <p>list2</p><p>list1</p>
          <p>list3</p><p>list1</p>
      </div>
    </div>
</div>



<div class="dropdown">
  <button class="dropbtn">DropDown</button>
  <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
  </div>
</div>

<?php include "bottom.php" ?>
