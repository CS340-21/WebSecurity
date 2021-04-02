<?php
session_start();

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["logged_in"] !== true){
  header("Location: login.php");
  exit;
}

/* Redirect user if they're not an admin */
if ($_SESSION["permissions"] == 0){
  header("Location: welcome.php");
  exit;
}

$username = $_SESSION["userid"];

/* Give admin permissions button link */
$admin = '';
if ($_SESSION["permissions"] >= 1){
  $admin = '<button onclick="window.location.href=\'admin.php\';">Admin Panel</button>';
}

/* Give the owner the secret button */
if ($_SESSION["permissions"] == 2){
  $owner = '<button onclick="window.location.href=\'admin-secret.php\';">Secret</button>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"> <title>Admin Panel</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="main">
    <h2>Admin Panel</h2>
  </div>

  <?php include('template-admin.php') ?>

</body>

</html>
