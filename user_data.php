
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/
    azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="user_data.php" method="post" class="form d-flex justify-content-center">
        <label for="Name" class="form-label" >Name</label><br>
        <input type="text" name="name" id="Name" class="form-control"><br>
        <label for="email" class="form-label" >Email</label><br>
        <input type="text" name="email" id="email" class="form-control"><br>
        <label for="dob" class="form-label" >Date of Birth</label><br>
        <input type="date" name="dob" id="" class="form-control"><br>
        <label for="gender" class="form-label" >Gender</label><br>
        <input type="text" name="gender" id="" class="form-control"><br>
        <label for="country" class="form-label" >Country</label><br>
        <input type="text" name="country" id="" class="form-control m-2"><br>
        <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form> 
    
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $mydata = fopen("data/user.csv" , "a");
    $csv = $_POST['name'] . " The following are your details ".
     $_POST['email']. " " . $_POST['dob']. " " .$_POST['gender']. " "
      . $_POST['country'] . " " ."\n";

fwrite( $mydata , $csv );
fclose($mydata);
}


?>