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
    <h3>Phishing</h3>
    <img src="../img/phishingattack.jpg" alt="" align="right"
      style="width: 50%;
             height: auto;
             aspect-ratio: attr(width) / attr(height);
             padding: 30px;
    ">
    <p>
      Phishing is a cybercrime in which the target is sent a fraudulent page to obtain sensitive information such as login information or credit card
      numbers. Phishing attacks are designed to appear legitimate which creates this sense of urgency and fear to compel to the attack. Companies are even 
      hiring blue hat hackers to simulate a phishing attack on their employees. It's like the saying goes: The biggest vulnerabilty in the cybersecurity 
      field are humans themselves. A good way to check if site is legitimate is checking for the domain and to be cautiuous when clicking links.
    </p>
    <p>
      So, how does a phishing attack work? There are a variety of ways a cybercriminal can design one such as keylogging and storing the texts in a database or deploying
      malicious code to monitor the system. For this example, we'll be using the Scandinavian Defense website to create a phishing attack. The first step involves replicating 
      the login page which is relatively easy if they have chrome. A simple copy and paste will quickly get the job done. Next, is modifying the code to direct the 
      victim's input to the cyberscriminal's hands which means using some sort of database. Once the code is modified and the database is set up, it's up to the victim 
      to recognize the legitamacy of the page.
    </p>
    <p>
      - JosefB, Discord Moderator and CEO
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
