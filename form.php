<?php
$filepath = "data/user.csv";

$output = file_get_contents($filepath);
$foutput = explode("\n", $output);

print_r($foutput);



?>