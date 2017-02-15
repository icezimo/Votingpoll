 <?php
  session_start();
  unset($_SESSION["login_user"]);
  
  // logout
  session_destroy();
  echo "<script type='text/javascript'>document.location = \"index.php\";</script>"
?>