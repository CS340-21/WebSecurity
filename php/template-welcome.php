<?php
session_start();

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["logged_in"] !== true){
  header("Location: login.php");
  exit;
}

$username = $_SESSION["userid"];

/* Give admin panel link if user is admin */
$admin = '';
if ($_SESSION["permissions"] >= 1){
  $admin = '<button onclick="window.location.href=\'admin.php\';">Admin Panel</button>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"> <title>Welcome</title>
<link rel="stylesheet" href="../css/welcome.css">
</head>

<body>

  <div class="sidebar">
    <button onclick="window.location.href='welcome.php';">Home</button>
    <button onclick="window.location.href='tut-sql.php';">SQL Injections</button>
    <button onclick="window.location.href='tut-brute.php';">Brute Force</button>
    <button onclick="window.location.href='tut-dict.php';">Dictionary Attacks</button>
    <button onclick="window.location.href='tut-phish.php';">Phishing</button>
    <button onclick="window.location.href='tut-dos.php';">Denial of Service</button>
    <button onclick="window.location.href='tut-social.php';">Social Engineering</button>
  </div>

  <div class="banner">
    <div class="logout">
      <button onclick="window.location.href='logout.php';">Logout</button>
      <div class="username">
        <?php echo $username?>
        <div class="admin">
          <?php echo $admin ?>
        </div>
      </div>
    </div>
    <a href="welcome.php" id="logo"><img src="../img/Logo.jpeg" alt="Logo"
      style="position: absolute;
             top: -17px;
             left: 1%;
             width: 105px;
             padding: 5px;
    "></a>

</body>
</html>
