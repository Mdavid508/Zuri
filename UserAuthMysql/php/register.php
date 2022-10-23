<?php

include "config.php";

//register users
//insert Query will be used to insert data into the database
if(isset($_POST['register'])){

    

    $fullnames = $_POST['fullnames'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];

    $conn = db();

    $sql = "INSERT INTO Students (full_names, email, password, country) VALUES ('$fullnames', '$email', '$password', '$country', '$gender')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "User registered successfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
 
?>
 