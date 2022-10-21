<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $mydata = fopen("storage/users.csv" , "w");
    
    $csv = $username . "," . $email . "," . $password . "\n";
    
    fwrite( $mydata , $csv );
    fclose($mydata);
    
    echo "You have Successfully Registered an Account with us";
    // echo "OKAY";
}
// echo "HANDLE THIS PAGE";

