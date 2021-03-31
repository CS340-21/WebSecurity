<?php include "./inc/dbinfo.inc"; ?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Form</title>
</head>

<body>
<?php
    /* Check passwords match */
    if ($_POST["psw"] != $_POST["psw-repeat"]){
        echo "Passwords do not match";
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
        echo 'Username has been taken';
        return false;
    }

    /* Add new user into database */
    $result = mysqli_query($connection,
        "INSERT $table SET user_id='$username', pwd='$psw'");
    if ($result){
        echo "Registration successful!";
        return true;
    }
    else{
        echo "Registration failed";
        return false;
    }
?>
</body>

</html>
