<?php
session_start();

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["logged_in"] !== true){
  header("Location: login.php");
  exit;
}

$username = $_SESSION["userid"];
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Form</title>
<link rel="stylesheet" href="../main.css">
</head>

<body>
  <!-- Front page display -->
  <div class="front-page">
    <div class="front">
      <h2>Registration successful!</h2>
        <p>
          Welcome to Scandinavian Defense, <?php echo $username ?>! Click below to sign into your new account.
        </p>
    <div class="formlarge">
      <p class="message">
        <a href="login.php">Click here to login</a></p>
    </div>
  </div>

</body>

</html>
