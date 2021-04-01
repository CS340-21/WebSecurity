<?php include "./inc/dbinfo.inc"; ?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Form</title>
<link rel="stylesheet" href="main.css">
</head>

<body>

  <!-- Register Form -->
  <div class="register-page">
    <div class="form">
      <div class="register">
        <div class="register-header">
          <h3>Register</h3>
        </div>
      </div>
      <form id="registerForm" action="register.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required/>
        <input type="password" id="psw" name="psw" placeholder="Password" required/>
        <input type="password" id="psw-repeat" name="psw-repeat" placeholder="Repeat Password" required/>
        <button>Register</button>
      </form>
    </div>
  </div>


<?php

  /* Check passwords match */
  if ($_POST["psw"] != $_POST["psw-repeat"]){
    echo '<script>alert("Passwords do not match")</script>';
    return false;
  }

  /* Connect to database thru ./inc/dbinfo.inc file */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);
  $table = "users";


  /* Return if username exists */
  $username = $_POST["username"];
  $psw = $_POST["psw"];
  
  $sql_u = mysqli_query($connection, 
    "SELECT * FROM $table WHERE user_id='$username'");
  if (mysqli_num_rows($sql_u) > 0){
    echo '<script>alert("Username has been taken")</script>';
    return false;
  }

  /* Add new user into database */
  $result = mysqli_query($connection,
    "INSERT $table SET user_id='$username', pwd='$psw'");
  if ($result){
    echo '<script>alert("Registration successful!")</script>';
    return true;
  }
  else{
    echo "Registration failed";
    return false;
  }
?>
</body>

</html>
