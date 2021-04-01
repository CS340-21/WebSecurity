<?php
session_start();

/* Redirect user if they're not logged in */
if (!isset($_SESSION["userid"]) || $_SESSION["logged_in"] !== true){
  header("Location: login.php");
  exit;
}

$username = $_SESSION["userid"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Form</title>
<link rel="stylesheet" href="welcome.css">
</head>

<body>

  <div class="welcome-page">
    <div class="banner">
      <img src="img/Logo.jpeg" alt="Logo"
        style="position: absolute;
               top: -17px;
               left: 1%;
               width: 105px;
      ">
      <span class="logout">
        <button onclick="window.location.href='logout.php';">Logout</button>
        <div class="username">
          <h3><?php echo $username?></h3>
        </div>
      </span>
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
      <div class="sidebar">
        <button onclick="window.location.href='tut-sql.php';">SQL Injections</button>
        <button onclick="window.location.href='tut-weak.php';">Weak Authentication</button>
        <button onclick="window.location.href='tut-brute.php';">Brute Force</button>
        <button onclick="window.location.href='tut-brute.php';">Phishing</button>
        <button onclick="window.location.href='tut-dos.php';">Denial of Service</button>
        <button onclick="window.location.href='tut-social.php';">Social Engineering</button>
      </div>  <!-- End Sidebar -->
    </div>  <!-- End Banner -->
  </div>  <!-- End Welcome-Page -->

</body>

</html>
