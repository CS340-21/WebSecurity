<?php
echo "Log in successful";

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true){
  /* header("Location: login.php"); */
  exit;
}
?>
