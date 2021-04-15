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
    <h3>Dictionary Attacks</h3>
    <p>
      Like brute force attacks, dictionary attacks make repeated login attempts with a
      known username and unknown password. Unlike brute force, however, dictionary attacks
      use more sophisticated methods. They usually pull passwords from a
      <a href="https://github.com/danielmiessler/SecLists/blob/master/Passwords/Common-Credentials/10k-most-common.txt"
         style="font-size: 18px;">list of common passwords</a>
      and try those, making substitutions such as capitalizing the first letter of
      every word or adding numbers at the end like birth years. Because dictionary attacks
      guess using whole words or phrases, they are much more effective than brute force
      for cracking passwords longer than eight characters.
    </p>
    <img src="../img/dict.png" alt="" align="left"
      style="width: 40%;
             height: auto;
             aspect-ratio: attr(width) / attr(height);
             padding: 10px;
    ">
    <p>
      Dictionary attacks can be tricky to defend against. They prey on people's inability
      to remember sequences and reliance on their use of simple patterns, phrases, and numbers.
      Ultimately, it comes down to a tradeoff between password complexity and memorability.
      To strike a good middle ground, use three to five uncommon or foreign words with random
      capitalization and numbers in the middle. Alternatively, a password manager can be a
      powerful tool for automatically storing passwords on a local machine.
    </p>
    <p>
      Stay safe!
    </p>
    <p>
      - FransTheFriendly
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
