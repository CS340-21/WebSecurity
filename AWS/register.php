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
    /*
    if ($database) echo nl2br("DATABASE FOUND\n");
    if (!$database) return false;
    */


    /* Return if username exists */
    $username = $_POST["username"];
    $psw = $_POST["psw"];
    
    $sql_u = mysqli_query($connection, 
        "SELECT * FROM usernames WHERE user_id='$username'");
    if (mysqli_num_rows($sql_u) > 0){
        echo 'Username has been taken';
        return false;
    }

    /* Add new user into database */
    $result = mysqli_query($connection,
        "INSERT usernames SET user_id='$username', pwd='$password'");
    if ($result){
        echo "Registration successful!";
        return true;
    }
    else{
        echo "Registration failed";
        return false;
    }

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
    $t = mysqli_real_escape_string($connection, $tableName);
    $d = mysqli_real_escape_string($connection, $dbName);

    $checktable = mysqli_query($connection,
            "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

    if(mysqli_num_rows($checktable) > 0) return true;

    return false;
}

?>
</body>

</html>
