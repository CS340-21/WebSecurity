<?php
session_start();

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["logged_in"] !== true){
  header("Location: login.php");
  exit;
}

$username = $_SESSION["userid"];

/* Give admin permissions button link if user is admin */
$admin = '';
if ($_SESSION["permissions"] >= 1){
  $admin = '<button onclick="window.location.href=\'admin.php\';">Admin Panel</button>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home</title>
<link rel="stylesheet" href="../css/welcome.css">
</head>

<body>

  <div class="main">
    <h3>Scoreboard</h3>
    <p>
     implement score-board here 
    </p>
    <img src="../img/juice-shop.png" alt="" align="middle"
      style="width: 100%;
             height: auto;
             aspect-ratio: attr(width) / attr(height);
             padding: 10px;
    ">
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
