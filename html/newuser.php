<?php
echo "Registration successful!";

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true){
  exit;
}
?>
