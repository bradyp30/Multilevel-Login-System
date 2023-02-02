<?php
// Get a connection for the database
require_once('sql_conn.php');

// Create a query for the database
$query = "SELECT userName, passWord, captcha_type, RGB FROM group9_db";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Username</b></td>
<td align="left"><b>Password</b></td>
<td align="left"><b>Captcha Image</b></td>
<td align="left"><b>RGB Value</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['userName'] . '</td><td align="left">' . 
$row['passWord'] . '</td><td align="left">' .
$row['captcha_type'] . '</td><td align="left">' .
$row['RGB'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>