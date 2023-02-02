<?php
// Defined as constants so that they can't be changed
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
#table name is xaamp.
DEFINE ('DB_NAME', '3fa_db'); 
// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

//$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
echo "Connection Successful";
?>

