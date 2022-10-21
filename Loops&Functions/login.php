<?php
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    loginUser($username, $password);
}

function loginUser($username, $password)
{
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */
    $filename = "storage/users.csv";
    $users = file_get_contents($filename);
    $users = explode("\n", $users);
    $login = false;
    foreach ($users as $user) {
        $user = explode(",", $user);
        if ($user[1] == $username && $user[2] == $password) {
            $login = true;
            break;
        }
    }

    // check if login is true
    if ($login) {
        echo "You have successfully logged in";
    } else {
        echo "Invalid username or password";
    }
}
