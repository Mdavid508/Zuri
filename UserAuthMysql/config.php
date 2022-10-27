<?php

$host = "127.0.0.1";
$user = "root";
$db = "zuriphp";
$password = "";

function db($host, $user, $db, $password)
{
    //set your configs here

    $conn = mysqli_connect($host, $user, $password, $db);
    if (!$conn) {
        echo "<script> alert('Error connecting to the database') </script>";
    } else {
        // echo "Connected to the database";
    }
    return $conn;
}
