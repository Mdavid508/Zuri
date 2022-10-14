



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
$filepath = "data/user.csv";

$output = file_get_contents($filepath);
$foutput = explode("\n", $output);

print_r($foutput);

?>