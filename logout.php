<?php  

  session_start();
  unset($_SESSION["USERSESSION"]);
  session_destroy();
  header("Location: /rev/blog/register.php")

?>