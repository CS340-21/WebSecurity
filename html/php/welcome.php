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
    <h3>The Internet: A Tool and a Weapon</h3>
    <p>
      As you may be aware, the internet has become a remarkably important tool for
      humanity in the 21st century. Media, hobbies, social events, shopping and even banking
      are just some of the everyday activities that have been integrated into the web
      and made available to the general public, and for nearly no cost at all.
      But with great availability comes great reponsibility; the same tools that are used
      to construct websites and databases can be used against them. Every day, malicious actors
      carry out attacks on domains across the web. Hacking has become a billion dollar industry,
      and it shows no signs of slowing down.
    </p>
    <p>
      Luckily for you, Scandinavian Defense is here to help! As a member of our website, you have
      access to the resources you need to protect your website and its users from cybercriminals across
      the globe. Just...promise you won't use this knowledge against us (not that you could, we are experts after all).
    </p>
    <p>
      Use the sidebar to access information on different attacks.
    </p>
    <p>
      - JosefB, Head Admin
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
