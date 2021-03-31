<?php include "./inc/dbinfo.inc"; ?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Form</title>
</head>

<body>
<?php
    $username = $_POST["userid"];
    $pwd = $_POST["pwd"];

    /* Connect to database thru ./inc/dbinfo.inc file */
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
    if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

    $database = mysqli_select_db($connection, DB_DATABASE);


    /* Accept new session if user/password is valid, otherwise reject */
    $result = mysqli_query($connection,
        "SELECT user_id, pwd FROM usernames WHERE user_id='$username' AND pwd='$pwd'");

    if(mysqli_num_rows($result) > 0){
        $_SESSION["logged_in"] = true;
        $_SESSION["name"] = $username;
    }
    else{
        echo "Username or password is incorrect";
        return false;
    }

?>
</body>

</html>
