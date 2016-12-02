<!DOCTYPE html>
<?php session_start(); ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Fred Books</title>
    <link href="main.css?ts=<?=time()?>&quot" rel="stylesheet" type="text/css">
    <link href="login.css?ts=<?=time()?>&quot" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
      <img id="fred-logo" src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAALBAAAAJDA4M2ZjNDZmLTA3NTgtNDhhYS1iMzBhLTViMGU4ZGZkNmJhNw.png"/>
      Fred Books
    </header>
    <nav>
      <ul>
        <li class="<?php echo $page == 'index' ? 'current': '' ?>">
          <a href="index.php">Home</a>
        </li>
        <li class="<?php echo $page == 'market' ? 'current': '' ?>">
          <a href="market.php">Market</a>
        </li>
        <li class="<?php echo $page == 'contact' ? 'current': '' ?>">
          <a href="contact.php">Contact</a>
        </li>
      </ul>
    </nav>
