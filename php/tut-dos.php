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
    <h3>Denial of Service</h3>
    <p>
      Although Denial-of-Service (DoS) attacks aren't practiced in ethical hacking curriculums or similar websites, it's good to be aware of what attackers are capable of. Distributed-Denial-of-Service (DDoS) attacks are treated similarly. These type of attacks are "meant to shut down a machine or network" to make it "inaccessible to its intended users." A <a href="https://www.paloaltonetworks.com/cyberpedia/what-is-a-denial-of-service-attack-dos" style="font-size: 18px;">DoS attack</a> is accompished by flooding targeted resource with "surperflous requests in an attempt to overload systems and prevent legitimate requests from being fulfilled." DoS attacks are most often seen on high-profile and public targets/organizations, like Microsoft and PlayStation Network. The <a href="https://en.wikipedia.org/wiki/Denial-of-service_attack" style="font-size: 18px;">Wikipedia page</a> for this topic is very helpful (like usual).
   </p>
   <p>
      Typically, <a href="https://www.cloudflare.com/learning/ddos/glossary/denial-of-service/" style="font-size: 18px;">DoS attacks</a> fall into 2 categories: Buffer overflow attacks and flood attacks. Buffer overflow attacks cause the resource to "consume all available disk space, memory, or CPU time" and often result in sluggish responses, crashes, or other such behaviors. Flood attacks saturate a resource with an "overwhelming amount of packets" thus exceeding the server capacity. Similarly, <a href="https://www.cloudflare.com/learning/ddos/what-is-a-ddos-attack/" style="font-size: 18px;">DDoS attacks</a> wish to accompish the same result with a more effecient and (hopefully) untraceable method. By utilizing multiple "compromised compute systems as sources of attack traffic," bad actors can turn unwitting machines into slaves for their bidding, often in the form of a botnet.
   </p>
    <p>
      The largest DDoS attack <a href="https://www.cloudflare.com/learning/ddos/famous-ddos-attacks/" style="font-size: 18px;">of all time</a> took place September 2017 on Google services, reaching a critical mass of 2.54 Tbps. Attackers "spoofed packets to 180,000 web servers, which in turn sent responses to Google." The attackers had leveraged similar attacks at Google's infrastructure "over the previous six months." Similarly, AWS, GitHub, and the nation of Estonia were all hit by DDoS attacks in the past. If a security researcher wanted to execute an attack like this, tools such as the <a href="https://en.wikipedia.org/wiki/Low_Orbit_Ion_Cannon" style="font-size: 18px;">Low Orbit Ion Cannon</a> (LOIC) can be utilized. Fair warning, internet service providers may notice this unusually dense traffic to a webserver (even if you own it) and take appropriate measures. Furthermore, we claim no responsibility for the havoc you may or may not wreak using this application and similar ones without training/permission.
    </p>
    <p>
      - AnonyMoose
    </p>
  </div>  <!-- End Main -->

  <?php include('template-welcome.php') ?>

</body>

</html>
