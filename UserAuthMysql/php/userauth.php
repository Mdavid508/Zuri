<?php

require_once "../config.php";


//register users 
//insert Query will be used to insert data into the database
function registerUser($fullnames, $email, $password, $gender, $country)
{
    //create a connection variable using the db function in config.php
    $conn = db();
    //check if user with this email already exist in the database
    $sql = "SELECT * FROM Students WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h1 style='color: red'>User with this email already exist</h1>";
    } else {
        
    $sql = "INSERT INTO Students (full_names, email, password, country, gender) VALUES ('$fullnames', '$email', '$password', '$country', '$gender')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "User registered successfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

}


//login users
//select Query will be used to select data from the database
function loginUser($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db();

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
    $sql = "SELECT * FROM Students WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "User logged in successfully";
    } else {
        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<h1 style='color: red'>Incorrect email or Password</h1>";
    }
}

//reset password
//update Query will be used to update data in the database
function resetPassword($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db();
    // echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
    
        $sql = "UPDATE students SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Password reset successful";
        }else{
            echo "Password reset failed";
        }
    
}
//show all users
//select Query will be used to select data from the database
function getusers()
{
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo "<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            //show data
            echo "<tr style='height: 30px'>" .
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] .
                "</td> <td style='width: 150px'>" . $data['country'] .
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                "value=" . $data['id'] . ">" .
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>" .
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

//delete user
//delete Query will be used to delete data from the database
function deleteaccount($id)
{
    $conn = db();
    //delete user with the given id from the database
    $sql = "DELETE FROM Students WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "User deleted successfully";
    }else{
        echo "User deletion failed";
    }

}
}
