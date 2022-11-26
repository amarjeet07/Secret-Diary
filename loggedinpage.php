<?php
session_start();
if(array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
}
if(array_key_esists("id", $_SESSION)) {
   echo "<P>Logged in!  <a herf='index.php?logout=1'>Log out</a></p>";
}
else{
    header("Location: index.php");
}
?>