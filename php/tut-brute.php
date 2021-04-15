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
    <h3>Brute Force</h3>
    <p>
      One of most rudimentary types of attacks are brute force attacks. These are usually performed
      on passwords with a known account name. A script or program is run which rapidly makes login
      attempts with random passwords until success is reached. The algorithm behind these attempts
      is not sophisticated, relying mostly on incremental guesses starting with something like 'aaa'
      then 'aab' 'aac' 'aad' etc.
    </p>
    <p>
      Password security increases with length. The number of potential passwords for a given length is
      given by the number of possible characters raised to the length. For example, if the password can use
      all uppercase letters, lowercase letters, numerical digits, and symbols of the numerical digit keys,
      the total number of possible characters is 26+26+10+10=72. If the length is 6 characters, the total
      number of possible passwords is 72^6=139,314,069,504. For a single machine performing brute force,
      that may take some time to crack, but it's not impossible. Many brute force attacks are carried out
      with multiple machines, so it may take even less time than that.
    </p>
    <p>
      There are two vectors of defense for protection against brute force attacks. The first is to simply
      limit the number of login attempts from an IP over a range of time, though this can be circumvented
      using multiple machines as mentioned above. The second and superior method is to enforce an 
      eight character minimum on all account passwords. Since password length grows exponentially, each
      character greatly decreases the success rate of brute force attempts.
    </p>
    <p>
      - Sven22
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
