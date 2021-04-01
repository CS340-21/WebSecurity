<?php include "./inc/dbinfo.inc"; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
  $error = '';

  $username = $_POST["userid"];
  $pwd = $_POST["pwd"];

  /* Connect to database thru ./inc/dbinfo.inc file */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
  $database = mysqli_select_db($connection, DB_DATABASE);
  $table = "users";

  /* Accept new session if user/password is valid, otherwise reject */
  /* The BINARY keyword makes sure it's case-sensitive. Note it's used for pwd but not username */
  $result = mysqli_query($connection,
    "SELECT user_id, pwd FROM $table WHERE user_id='$username' AND pwd=BINARY '$pwd'");

  if(mysqli_num_rows($result) > 0){
    $_SESSION["logged_in"] = true;
    $_SESSION["name"] = $username;
    header("Location: welcome.php");
  }
  else{
    $error = '<p class="error">Invalid username or password</p>';
    goto end;
  }

  end:
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-6">
<meta name="viewport" content="width=device-width, initial-scale=2">
<title>Scandinavian Defense Login</title>
<link rel="stylesheet" href="main.css">
</head>

<body>

  <!-- Login Form -->
  <div class="login-page">
    <div class="form">
      <div class="login">
        <div class="login-header">
          <h3>Login to an existing account</h3>
        </div>
      </div>
      <form name="loginForm" method="post" action="">
        <input type="text" id="userid" name="userid" placeholder="Username" required>
        <input type="Password" id="pwd" name="pwd" placeholder="Password" required>
        <input type="Reset">
        <input type="submit" name="submit" value="Login"\>
        <p class="message">Not registered?
          <a href="register.php">Create an account</a></p>
        <?php echo $error; ?>
      </form>
    </div>
  </div>

</body>
</html>