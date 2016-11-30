<?php
// encryptTutorial.php
$mainpass = "test123";

// $md5pass = md5($mainpass);
// $sha1pass = sha1($mainpass);
// $cryptpass = crypt($mainpass, "st");

$md5pass = md5($mainpass);
$sha1pass = sha1($md5pass);
$cryptpass = crypt($sha1pass, "st");

echo $md5pass . "<br>";
echo $sha1pass . "<br>";
echo $cryptpass . "<br>";
?>
