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
    <h3>Social Engineering</h3>
    <img src="../img/socialengineering.png" alt="" align="right"
      style="width: 50%;
             height: auto;
             aspect-ratio: attr(width) / attr(height);
             padding: 30px;
    ">
    <p>
      Social engineering is the art of retrieving sensitive information through means of communication 
      and deception. Instead of technical knowledge, a social engineer exploits natural human tendencies to
      gain trust and establish themselves as someone of importance. A skilled social engineer can use a mix
      of friendliness and confidence to fool an employee into simply handing over important credentials.
      When it works, social engineering can be the most effective tool to quickly obtain entry into
      a system or organization.
    </p>
    <p>
      Due to the large variety and flexible nature of social interactions, social engineering is quite
      difficult to fully protect against. There's no software that can patch people, after all. The
      only effective strategy is proper training of employees and a hierarchical structure that
      requires multiple approvals from different people of different ranks within the organization.
      By dispersing responsibility across multiple employees, the chance of success for the social engineer
      falls greatly.
    </p>
    <p>
      - JosefB, University Centre in Svalbard
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
