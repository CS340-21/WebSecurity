<?php include "./inc/dbinfo.inc"; ?>
<?php

/* Only execute PHP if it receives data from HTML */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

  /* Check passwords match */
  $error = '';
  if ($_POST["psw"] != $_POST["psw-repeat"]){
    $error = '<p class="error">Passwords do not match</p>';
    goto end;
  }

  $username = $_POST["username"];
  $psw = $_POST["psw"];

  /* Reject if username is over 20 chars */
  if (strlen($username) > 20){
    $error = '<p class="error">Username too long (20 char max)</p>';
    goto end;
  }

  /* Connect to database thru ./inc/dbinfo.inc file */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);
  $table = "users";


  /* Return if username exists */
  $sql_u = mysqli_query($connection, 
    "SELECT * FROM $table WHERE user_id='$username'");
  if (mysqli_num_rows($sql_u) > 0){
    $error = '<p class="error">Username is already in use</p>';
    goto end;
  }

  /* Add new user into database and take them to new user page */
  $result = mysqli_query($connection,
    "INSERT $table SET user_id='$username', pwd='$psw'");
  if ($result){
    session_start();
    $_SESSION["logged_in"] = true;
    $_SESSION["userid"] = $username;
    header("Location: newuser.php");
  }
  
  end:
}

?>

<!DOCTYPE html>
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
          <h3>Create an account</h3>
        </div>
      </div>
      <form id="registerForm" action="" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required/>
        <input type="password" id="psw" name="psw" placeholder="Password" required/>
        <input type="password" id="psw-repeat" name="psw-repeat" placeholder="Repeat Password" required/>
        <input type="submit" name="submit" value="Register"/>
          <p class="message">Have an account?
            <a href="login.php">Click here to login</a></p>
        <?php echo $error; ?>
      </form>
    </div>
  </div>

</body>

</html>
