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

  <div class="sidebar">
    <button onclick="window.location.href='admin.php';">Admin Panel</button>
    <button onclick="window.location.href='admin-add.php';">Add Admin</button>
    <button onclick="window.location.href='admin-revoke.php';">Revoke Admin</button>
    <button onclick="window.location.href='admin-remove.php';">Remove User</button>
  </div>

  <div class="banner">
    <div class="logout">
      <button onclick="window.location.href='logout.php';">Logout</button>
      <div class="username">
        <?php echo $username?>
        <div class="admin">
          <button onclick="window.location.href='welcome.php';">Home Panel</buton>
        </div>
      </div>
    </div>
    <a href="welcome.php" id="logo"><img src="../img/Logo.jpeg" alt="Logo"
      style="position: absolute;
             top: -17px;
             left: 1%;
             width: 105px;
    "></a>

</body>
</html>
