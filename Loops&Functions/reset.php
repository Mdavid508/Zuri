<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword)
{
    //open file and check if the username exist inside
    //if it does, replace the password
    //if it does not, echo "User does not exist"

    $filename = "storage/users.csv";
    $users = file_get_contents($filename);
    $users = explode("\n", $users);
    // 
    $reset = false;
    foreach ($users as $user) {
        $user = explode(",", $user);
        if ($user[1] == $email) {
            $user[2] = $newpassword;
            $reset = true;
            break;
        } else {

            $reset = false;
        }
    }
    if ($reset) {

        echo "Password Reset Successfully";
    } else {
        echo "Password Reset Failed Try Again";
    }
}
// echo "HANDLE THIS PAGE";
