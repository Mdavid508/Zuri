<?php
// include_once '../config.php';
require_once "../config.php";



//register users 
//insert Query will be used to insert data into the database
function registerUser($fullnames, $email, $password, $gender, $country)
{
    //create a connection variable using the db function in config.php
    $conn = db('127.0.0.1', 'root', 'zuriphp', '');
    //check if user with this email already exist in the database
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h1 style='color: red'>User with this email already exist</h1>";
    } else {

        $sql = "INSERT INTO students (full_names, email, password, country, gender) VALUES ('$fullnames', '$email', '$password', '$country', '$gender')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            echo "<h1 style='color: green'>User registered successfully</h1>";
        }
    }
    // if($result){
    //     echo "User registered successfully";
    // }else{
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }


}


//login users
//select Query will be used to select data from the database
function loginUser($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db('127.0.0.1', 'root', 'zuriphp', '');

    //creates a user session
    session_start();

    // echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
    $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(is_array($row)){
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
    }else{
        echo "<h1 style='color: red'>Invalid username or password</h1>";

    } 
    if(isset($_SESSION["email"])){
        header("Location: ../dashboard.php");
    }
    // if (mysqli_num_rows($result) > 0) {
    //     echo "<h1 style='color: green'>User logged in successfully</h1>";
    //     header("location:dashboard.php");
    // } else {
    //     echo "<h1 style='color: red'>Incorrect email or Password</h1>";
        
    // }
}

//reset password
//update Query will be used to update data in the database
function resetPassword($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db('127.0.0.1', 'root', 'zuriphp', '');
    // echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given

    $sql = "UPDATE students SET password = '$password' WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Password reset successful";
    } else {
        echo "Password reset failed";
    }
}
//show all users
//select Query will be used to select data from the database
function getusers()
{
    $conn = db('127.0.0.1', 'root', 'zuriphp', '');
    $sql = "SELECT * FROM students";
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
    $conn = db('127.0.0.1', 'root', 'zuriphp', '');
    //delete user with the given id from the database
    $sql = "DELETE FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "User deleted successfully";
    } else {
        echo "User deletion failed";
    }
}
