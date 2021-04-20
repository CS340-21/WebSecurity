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
    <h3>SQL Injections</h3>
    <p>
      According to the OWASP Top Ten, a widely used awareness document for web security, injection is the Number 1 web app security risk. As described on <a href="https://owasp.org/www-project-top-ten/" style="font-size: 18px;">the top ten,</a> injection flaws among database languages (SQL, NoSQL, OS, etc.) "occur when untrusted data is sent to an interpreter as part of a command or query." The attacker's "hostile data" can fool the interpreter into running commands and accessing data without "proper authorization." In certain situations, bad actors can turn a SQL injection into a denial-of-service attack by compromising the back-end infrastructure. Prevention for injection attacks require "keeping data separate from commands and queries." Specifics on attack vectors, impacts and more for SQL injections can be found <a href="https://owasp.org/www-project-top-ten/2017/A1_2017-Injection" style="font-size: 18px;">here</a>.
    </p>
    <p>
      Performing a SQL injection can be done in <a href="https://portswigger.net/web-security/sql-injection" style="font-size: 18px;">several different ways</a> with varying desired outcomes. For example, you can attempt to retrieve hidden data by "modifying an SQL query to return addition results" or subvert application logic by changing the query to interfere with it. Often times, the data you desire is not returned to you in a response, which is known as a "blind SQL injection." SQL injections are primarily performed incrementally by the hacker in calculated exploit attempts. However, there are resources and scripts that can automate this process, such as <a href="https://sqlmap.org/" style="font-size: 18px;">sqlmap</a>. For some targeted practice with SQL injections in a wide array of challenges, check out <a href="https://redtiger.labs.overthewire.org/" style="font-size: 18px;">RedTiger's Hackit</a>.
    </p>
    <img src="../img/sql-injection.svg" alt="" align="left"
      style="width: 100%;
             height: auto;
             aspect-ratio: attr(width) / attr(height);
	     padding: 10px;
    ">
    <p>
      img source: <a href="https://portswigger.net/web-security/sql-injection" style="font-size: 18px;">https://portswigger.net/web-security/sql-injection</a>
    </p>
    <p>
      - AnonyMoose
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
